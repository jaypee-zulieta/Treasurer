<?php

use App\Http\Controllers\DepositController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('deposits', DepositController::class);