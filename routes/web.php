<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraduationController;

Route::get('/', [GraduationController::class, 'index'])
    ->name('home');

Route::post('/check', [GraduationController::class, 'check'])
    ->name('check');