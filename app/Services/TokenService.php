<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

const TOKEN_SECRET = "senha_super_secreta_123";

class TokenService
{
    static function generateToken($user)
    {
        $token = JWT::encode(['user' => $user], TOKEN_SECRET, 'HS256');
        return $token;
    }

    static function decodeToken($token)
    {
        dd($token);
        $decoded = JWT::decode($token, new Key(TOKEN_SECRET, 'HS256'));
        return json_decode(json_encode($decoded), true)['user'];
    }

    static function formatTokenFromHeader($request)
    {
        $tokenSplited = explode('Bearer ', $request->header('Authorization'));
        if (sizeof($tokenSplited) === 2) {
            return $tokenSplited[1];
        }
        return false;
    }
}
