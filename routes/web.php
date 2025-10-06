<?php

use App\Http\Controllers\DepositController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return to_route('deposits.index');
});

Route::resource('deposits', DepositController::class);
Route::resource('users', UserController::class);

// Auth
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');