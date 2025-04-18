<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('/login', [AuthController::class, 'submitLogin'])->name('login.submit');


Route::get('/registrasi', [AuthController::class, 'tampilRegister'])->name('registrasi');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/kelas', [\App\Http\Controllers\Kelas::class, 'index'])->name('kelas.index');
    Route::get('/kelas/tambah', [\App\Http\Controllers\Kelas::class, 'tambah'])->name('kelas.tambah');
    Route::post('/kelas/simpan', [\App\Http\Controllers\Kelas::class, 'simpan'])->name('kelas.simpan');
    Route::get('/kelas/edit/{id}', [\App\Http\Controllers\Kelas::class, 'edit'])->name('kelas.edit');
    Route::post('/kelas/update/{id}', [\App\Http\Controllers\Kelas::class, 'update'])->name('kelas.update');
    Route::DELETE('/kelas/hapus/{id}', [\App\Http\Controllers\Kelas::class, 'hapus'])->name('kelas.hapus');

    Route::get('/siswa', [\App\Http\Controllers\Siswa::class, 'index'])->name('siswa.index');
    Route::get('/siswa/tambah', [\App\Http\Controllers\Siswa::class, 'tambah'])->name('siswa.tambah');
    Route::post('/siswa/simpan', [\App\Http\Controllers\Siswa::class, 'simpan'])->name('siswa.simpan');
    Route::get('/siswa/edit/{id}', [\App\Http\Controllers\Siswa::class, 'edit'])->name('siswa.edit');
    Route::post('/siswa/update/{id}', [\App\Http\Controllers\Siswa::class, 'update'])->name('siswa.update');
    Route::DELETE('/siswa/hapus/{id}', [\App\Http\Controllers\Siswa::class, 'hapus'])->name('siswa.hapus');
    Route::get('/siswa/kelas/{id}', [\App\Http\Controllers\Siswa::class, 'perkelas'])->name('siswa.perkelas');
});
