<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/me', [AuthController::class, 'logged'])->middleware('auth:sanctum');
Route::get('/categories', [CategoryController::class, 'index']);
Route::post("/login", [AuthController::class, 'authenticate']);
Route::post("/send-reset-password-email", [AuthController::class, 'passwordEmail']);
Route::post("/logout", [AuthController::class, 'logout']);

Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth:sanctum');
Route::get('/tickets/{id}', [TicketController::class, 'show'])->middleware('auth:sanctum');
Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::get('/comments', [CommentController::class, 'index'])->middleware('auth:sanctum');
Route::get('/users/token/{token}', [AuthController::class, 'userByToken']);

Route::post('/reset-password', [AuthController::class, 'updatePassword']);
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->middleware('auth:sanctum');
Route::post('/tickets', [TicketController::class, 'store'])->middleware('auth:sanctum');
