<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/me', [AuthController::class, 'logged'])->middleware('auth:sanctum')->name('personal-area');

Route::post("/login", [AuthController::class, 'authenticate']);

Route::post("/logout", [AuthController::class, 'logout']);
