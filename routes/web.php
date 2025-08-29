<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', [HospitalController::class, 'index'])->name('index');
    Route::get('/hospitalGetAll', [HospitalController::class, 'indexAll'])->name('hospitalGetAll');


    Route::resource('hospital', HospitalController::class)->names('hospital');
    Route::resource('patient', PatientController::class)->names('patient');
});
