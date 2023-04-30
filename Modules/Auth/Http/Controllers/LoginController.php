<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;
use Modules\Auth\Http\Requests\AttemptLoginRequest;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth::login');
    }

    public function attempt(AttemptLoginRequest $request)
    {
        $credentials = $request->validated();

        if (!auth()->attempt($credentials)) {
            throw ValidationException::withMessages(['username' => __('These credentials do not match our records')]);
        }

        return to_route('dashboard.index');
    }

    public function logout()
    {
        auth()->logout();

        return to_route('login.index');
    }
}
