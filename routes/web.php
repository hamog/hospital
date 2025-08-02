<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\DoctorRoleController;
use App\Http\Controllers\Admin\InsuranceController;
use App\Http\Controllers\Admin\OperationController;
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
    Route::resource('specialities', SpecialityController::class)->except('show');
    //doctor_roles
    Route::resource('doctor-roles', DoctorRoleController::class)->only(['index', 'edit', 'update']);
    //doctors
    Route::resource('doctors', DoctorController::class);
    //insurances
    Route::resource('insurances', InsuranceController::class)->except('show');
    //operations
    Route::resource('operations', OperationController::class)->except('show');
});

