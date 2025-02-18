<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/me', [AuthController::class, 'logged'])->middleware('auth:sanctum');

Route::post("/login", [AuthController::class, 'authenticate']);

Route::post("/logout", [AuthController::class, 'logout']);

Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth:sanctum');
