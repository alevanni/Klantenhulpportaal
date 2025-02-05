<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/me', [LoginController::class, 'logged'])->middleware('auth:sanctum')->name('personal-area');

Route::post("/login", [LoginController::class, 'authenticate']);

Route::get("/logout", [LoginController::class, 'logout']);
