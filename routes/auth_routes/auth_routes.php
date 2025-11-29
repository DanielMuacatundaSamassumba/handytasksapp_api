<?php

use App\Http\Controllers\user\auth\LoginController;
use App\Http\Controllers\user\CreateAccountController;
use Illuminate\Support\Facades\Route;

Route::post("/auth/register", [CreateAccountController::class, "store"] );
Route::post("/auth/login", [LoginController::class, "login"] );