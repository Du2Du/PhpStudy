<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class AuthService
{
    static function login($email, $senha)
    {
        $user = User::where(['email' => $email, 'password' => $senha])->get()->first();
        if (!$user) throw new UnauthorizedException("Credenciais Incorretas");
        $token = TokenService::generateToken($user);
        return ["token" => $token];
    }

    static function me(Request $request)
    {
        $token = TokenService::formatTokenFromHeader($request);
        $user = TokenService::decodeToken($token);
        return $user;
    }
}
