<?php

namespace App\Services;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class LogService
{

    static function createLog(Request $request)
    {
        $userController = new AuthController();
        $method = $request->method();
        $url = $request->path();
        $userId = $userController->me($request);
        dd($userId);
        dd($url);
    }
}
