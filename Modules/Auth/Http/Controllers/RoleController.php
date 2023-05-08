<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Routing\Controller;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use Modules\Auth\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $dataProvider = new EloquentDataProvider(Role::query());

        return view('auth::role.index', compact('dataProvider'));
    }

    public function create()
    {
        $guards = Role::guards();

        return view('auth::role.create', compact('guards'));
    }
}
