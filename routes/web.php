<?php

use App\Http\Controllers\HospitalController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HospitalController::class, 'index'])->name('hospital');

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('hospital', HospitalController::class);
});
