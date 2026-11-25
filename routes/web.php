<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagramController;

Route::get('/', function () {
    return view('auth.login');
});

// Rute untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Menampilkan form login
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Memproses login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Memproses logout

// Rute untuk guru
Route::middleware(CheckRole::class . ':guru')->group(function () {
    Route::get('/guru/data', [GuruController::class, 'index'])->name('guru.data'); // Menampilkan halaman guru
    Route::post('/guru/izin/{id}/validasi', [GuruController::class, 'updateIzinValidasi'])->name('guru.izin.validasi');
    Route::post('/guru/dispen/{id}/validasi', [GuruController::class, 'updateDispenValidasi'])->name('guru.dispen.validasi');
    
    Route::get('/export-izin-dispen', [GuruController::class, 'exportIzinDispen'])->name('guru.export');

    // Route tambahan untuk diagram
    Route::get('/guru/diagram', [GuruController::class, 'diagramUtama'])->name('guru.diagram');
    Route::get('/guru/diagram/{kelas}', [GuruController::class, 'diagramKelas'])->name('guru.diagram.kelas');
    Route::get('/guru/diagram/{kelas}/{subkelas}', [GuruController::class, 'diagramPerSiswa'])->name('guru.diagram.siswa');
});


// Rute untuk siswa
Route::middleware(CheckRole::class . ':siswa')->group(function () {
    Route::get('/siswa/home', [SiswaController::class, 'index'])->name('siswa.home'); // Halaman home siswa
    Route::get('/siswa/riwayat', [SiswaController::class, 'index'])->name('siswa.riwayat'); // Data riwayat
    Route::get('/siswa/beranda', [SiswaController::class, 'index'])->name('siswa.beranda'); // Beranda siswa

    // Rute izin dan dispen
    Route::get('/siswa/izin', [SiswaController::class, 'createIzin'])->name('siswa.izin'); // Form izin
    Route::post('/siswa', [SiswaController::class, 'storeIzin'])->name('siswa.store.izin'); // Simpan izin
    Route::get('/siswa/dispen', [SiswaController::class, 'createDispen'])->name('siswa.dispen'); // Form dispen
    Route::post('/siswa/dispen', [SiswaController::class, 'storeDispen'])->name('siswa.store.dispen'); // Simpan dispen

    Route::get('/siswa/profile', [ProfileController::class, 'index'])->name('siswa.profile'); // Halaman profil siswa
    Route::put('/siswa/profile', [ProfileController::class, 'update'])->name('siswa.update.profile'); // Update profil
});
