<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post("", [UserController::class, 'store']);

Route::post('deposito', [UserController::class, 'deposito']);

Route::post('transferir', [UserController::class, 'transferir']);
