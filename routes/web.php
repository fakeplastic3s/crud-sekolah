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
});
