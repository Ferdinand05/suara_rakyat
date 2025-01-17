<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriPengaduanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::post('/upload', [HomeController::class, 'upload'])->name('upload.image');
Route::get('/pengaduan', [HomeController::class, 'pengaduanView'])->name('home.pengaduan');



// SECTION LoggedIn
Route::middleware('auth')->group(function () {


    // Admin Only
    Route::middleware('isAdmin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('dashboard/role', RoleController::class);
        Route::resource('dashboard/kategori-pengaduan', KategoriPengaduanController::class);
        Route::resource('dashboard/users', UserController::class);
    });




    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});




//SECTION Guest
Route::middleware('guest')->group(function () {
    //SECTION - Authentication
    Route::get('login', [AuthController::class, 'loginIndex'])->name('login');
    Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');
    Route::get('register', [AuthController::class, 'registerIndex'])->name('register');
    Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');
});
