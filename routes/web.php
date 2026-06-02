<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraduationController;
use App\Exports\GraduationsExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [GraduationController::class, 'index'])
    ->name('home');

Route::post('/check', [GraduationController::class, 'check'])
    ->name('check');
    Route::get('/export-kelulusan', function () {

    return Excel::download(
        new GraduationsExport,
        'kelulusan.xlsx'
    );

});
