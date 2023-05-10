<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Routing\Controller;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use Modules\Auth\DataProvider\RoleDataProvider;
use Modules\Auth\Http\Requests\RoleStoreRequest;
use Modules\Auth\Http\Requests\RoleUpdateRequest;
use Modules\Auth\Models\Permission;
use Modules\Auth\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $dataProvider = new RoleDataProvider(Role::query());

        return view('auth::role.index', compact('dataProvider'));
    }

    public function show(Role $role)
    {
        return view('auth::role.show', compact('role'));
    }

    public function create()
    {
        $guards = Role::guards();
        $permissions = Permission::all();

        return view('auth::role.create', compact('guards', 'permissions'));
    }

    public function store(RoleStoreRequest $request)
    {
        $role = Role::create($request->only(['name', 'guard']));
        $permissions = $request->input('permissions');

        $role->givePermissionTo($permissions);

        return to_route('role.index');
    }

    public function edit(Role $role)
    {
        $guards = Role::guards();
        $permissions = Permission::all();

        return view('auth::role.edit', compact('role', 'guards', 'permissions'));
    }

    public function update(Role $role, RoleUpdateRequest $request)
    {
        $role->update($request->only('name', 'guard'));
        $role->syncPermissions($request->input('permissions'));

        return to_route('role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back();
    }
}
