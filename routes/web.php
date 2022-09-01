<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware('admin')->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin');
    });
    Route::middleware('mahasiswa')->group(function () {
        Route::get('mahasiswa/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa');
    });
});
