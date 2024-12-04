<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('isNotAuth')->group(function () {
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login_post');

    Route::get('/register', [AuthController::class, 'viewRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register_post');
});

Route::middleware('isAuth')->group(function () {
    Route::get('/todo', function () {
        return view('index');
    })->name('todo');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


