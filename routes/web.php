<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriPengaduanController;

Route::get('/', [HomeController::class, 'index'])->name('/');


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('dashboard/role', RoleController::class);
Route::resource('dashboard/kategori-pengaduan', KategoriPengaduanController::class);

//SECTION - Authentication
Route::get('login', [AuthController::class, 'loginIndex'])->name('login');
Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');
Route::get('register', [AuthController::class, 'registerIndex'])->name('register');
Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');
