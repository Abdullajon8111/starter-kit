<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use Modules\Auth\Http\Requests\PermissionCreateRequest;
use Modules\Auth\Http\Requests\PermissionStoreRequest;
use Modules\Auth\Http\Requests\PermissionUpdateRequest;
use Modules\Auth\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $dataProvider = new EloquentDataProvider(Permission::query());

        return view('auth::permission.index', compact('dataProvider'));
    }

    public function create(PermissionCreateRequest $request)
    {
        $guards = Permission::guards();

        return view('auth::permission.create', compact('guards'));
    }

    public function store(PermissionStoreRequest $request)
    {
        $permission = Permission::create($request->validated());

        if ($redirect_url = $request->input('redirect_url')) {
            return redirect($redirect_url);
        }

        return to_route('permission.index');
    }

    public function show(Permission $permission)
    {
        return view('auth::permission.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        $guards = Permission::guards();

        return view('auth::permission.edit', compact('permission', 'guards'));
    }

    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        $permission->update($request->validated());

        if ($redirect_url = $request->input('redirect_url')) {
            return redirect($redirect_url);
        }

        return to_route('permission.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back();
    }
}
