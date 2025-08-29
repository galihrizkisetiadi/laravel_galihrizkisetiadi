<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HospitalController::class, 'index'])->name('index');

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('hospital', HospitalController::class)->name('index', 'hospital');
    Route::resource('patient', PatientController::class)->name('index', 'patient');
});
