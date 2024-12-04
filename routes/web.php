<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'viewLogin'])->name('login');

Route::get('/register', function () {
    return view('Auth.register');
})->name('register');

Route::get('/todo', function () {
    return view('index');
})->name('todo');


