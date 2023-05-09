<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use Modules\Auth\Http\Requests\UserStoreRequest;
use Modules\Auth\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $dataProvider = new EloquentDataProvider(User::query());


        return view('auth::user.index', compact('dataProvider'));
    }

    public function show(User $user)
    {
        return view('auth::user.show', compact('user'));
    }

    public function create()
    {
        return view('auth::user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->only(['username', 'email', 'password']));
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $user->syncPermissions($request->input('permissions'));
        $user->syncRoles($request->input('roles'));

        return to_route('user.index');
    }

    public function edit(User $user)
    {
        return view('auth::user.edit', compact('user'));
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $values = $request->only(['username', 'email']);
        if ($password = $request->input('password', false)) {
            $values['password'] = bcrypt($password);
        }

        $user->update($values);
        $user->syncPermissions($request->input('permissions'));
        $user->syncRoles($request->input('roles'));

        return to_route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
