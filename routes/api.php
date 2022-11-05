<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PollController;

Route::post('daftar', [UserController::class, 'daftar']);
Route::post('token', [UserController::class, 'token']);

Route::post('lokasi', [PollController::class, 'lokasi']);
Route::post('undi', [PollController::class, 'undi']);

// Route::middleware(['auth:sanctum'])->group(function () {

//     Route::post('login', [UserController::class, 'login']);

// });


