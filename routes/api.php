<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/me', [AuthController::class, 'logged'])->middleware('auth:sanctum');

Route::post("/login", [AuthController::class, 'authenticate']);
Route::post("/send-reset-password-email", [AuthController::class, 'passwordEmail']);
Route::post("/logout", [AuthController::class, 'logout']);

Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');

Route::get('/users/token/{token}', [AuthController::class, 'userByToken']);
