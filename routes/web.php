<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
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

    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/tambah', [KelasController::class, 'tambah'])->name('kelas.tambah');
    Route::post('/kelas/simpan', [KelasController::class, 'simpan'])->name('kelas.simpan');
    Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::post('/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::DELETE('/kelas/hapus/{id}', [KelasController::class, 'hapus'])->name('kelas.hapus');

    // Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/tambah', [SiswaController::class, 'tambah'])->name('siswa.tambah');
    Route::post('/siswa/simpan', [SiswaController::class, 'simpan'])->name('siswa.simpan');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::DELETE('/siswa/hapus/{id}', [SiswaController::class, 'hapus'])->name('siswa.hapus');
    Route::get('/siswa/kelas/{id}', [SiswaController::class, 'perkelas'])->name('siswa.perkelas');

    // Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/tambah', [GuruController::class, 'tambah'])->name('guru.tambah');
    Route::post('/guru/simpan', [GuruController::class, 'simpan'])->name('guru.simpan');
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::post('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::DELETE('/guru/hapus/{id}', [GuruController::class, 'hapus'])->name('guru.hapus');
    Route::get('/guru/kelas/{id}', [GuruController::class, 'perkelas'])->name('guru.perkelas');
});
