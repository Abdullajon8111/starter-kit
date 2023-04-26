<?php

namespace Modules\Authorization\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;
use Modules\Authorization\Http\Requests\AttempLoginRequest;

class AuthorizationController extends Controller
{
    public function index()
    {
        return view('authorization::login');
    }

    public function attempt(AttempLoginRequest $request)
    {
        $credentials = $request->validated();

        if (!auth()->attempt($credentials)) {
            throw ValidationException::withMessages(['username' => 'failure']);
        }

        return 'success';
    }
}
