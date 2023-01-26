<?php

namespace App\Http\Controllers;

use App\Http\Requests\Form\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login']]);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->get('email');
        $senha = $request->get('password');
        return AuthService::login($email, $senha);
    }

    public function me(Request $request)
    {
        return AuthService::me($request);
    }
}
