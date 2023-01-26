<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('users')->group(base_path('routes/Users/users.php'));

Route::prefix('auth')->group(base_path('routes/Auth/auth.php'));

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
