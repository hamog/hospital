<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SpecialityController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

//Auth
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    //auth
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //specialities
    Route::resource('specialities', SpecialityController::class);
});

