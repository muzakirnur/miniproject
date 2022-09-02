<?php

use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MatakuliahController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\MahasiswaController;
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

        Route::get('admin/dosen', [DosenController::class, 'index'])->name('admin.dosen.index');
        Route::post('admin/dosen/create', [DosenController::class, 'create'])->name('admin.dosen.create');
        Route::get('admin/dosen/show/{dosen}', [DosenController::class, 'show'])->name('admin.dosen.show');
        Route::put('admin/dosen/update/{dosen}', [DosenController::class, 'update'])->name('admin.dosen.update');
        Route::get('admin/dosen/{dosen}/destroy', [DosenController::class, 'destroy'])->name('admin.dosen.destroy');

        Route::get('admin/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
        Route::post('admin/mahasiswa/create', [MahasiswaController::class, 'create'])->name('admin.mahasiswa.create');
        Route::get('admin/mahasiswa/show/{mahasiswa}', [MahasiswaController::class, 'show'])->name('admin.mahasiswa.show');
        Route::put('admin/mahasiswa/update/{mahasiswa}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
        Route::get('admin/mahasiswa/{mahasiswa}/destroy', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');

        // Route::get('admin/matakuliah', [MahasiswaController::class, 'index'])->name('admin.matakuliah.index');
    });
    Route::middleware('mahasiswa')->group(function () {
        Route::get('mahasiswa/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa');
    });
});
