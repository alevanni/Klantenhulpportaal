<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/me', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum')->name('personal-area');

Route::post("/login", [LoginController::class, 'authenticate']);
