<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

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

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
