<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PollController;

Route::get('/', function () {
    return view('home');
});



Route::middleware(['auth', 'role:super-admin'])->group(function () {

    Route::get('borang', [UserController::class, 'borang']);

    Route::get('user', [UserController::class, 'senarai']);
    Route::get('user/{user_id}', [UserController::class, 'satu']);
    Route::post('user', [UserController::class, 'daftar']);

    Route::get('sekolah', [SekolahController::class, 'senarai']);
    Route::post('sekolah', [SekolahController::class, 'daftar']);
    Route::get('sekolah/{sekolah_id}', [SekolahController::class, 'satu']);

    Route::get('poll', [PollController::class, 'senarai']);
    Route::post('poll', [PollController::class, 'daftar']);
    Route::get('poll/{poll_id}', [PollController::class, 'satu']);
    Route::put('poll/{poll_id}', [PollController::class, 'kemaskini']);

    Route::post('poll/{poll_id}/pilihan', [PollController::class, 'daftar_pilihan']);    
    Route::get('poll/{poll_id}/pilihan/{option_id}', [PollController::class, 'satu_pilihan']);    
    Route::post('poll/{poll_id}/pilihan/{option_id}', [PollController::class, 'undi']);    
    Route::put('poll/{poll_id}/pilihan/{option_id}', [PollController::class, 'kemaskini_pilihan']);    


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
