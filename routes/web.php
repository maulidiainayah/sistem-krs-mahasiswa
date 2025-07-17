<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('/', function () {
//     return view('menu');
// });

Route::get( '/Perkalian' , [App\Http\Controllers\Perkalian::class,'index']);
Route::post( '/Perkalian' , [App\Http\Controllers\Perkalian::class,'hitung']);

Route::get( '/penjumlahan' , [App\Http\Controllers\penjumlahan::class,'index']);
Route::post( '/penjumlahan' , [App\Http\Controllers\penjumlahan::class,'hitung']);

Route::resource( '/mahasiswa' , 'App\Http\Controllers\mahasiswaController');
Route::resource( '/dosen' , 'App\Http\Controllers\dosenController');
Route::resource( '/matkul' , 'App\Http\Controllers\matkulController');
Route::resource( '/prodi' , 'App\Http\Controllers\prodiController');
Route::resource( '/ruang' , 'App\Http\Controllers\ruangController');
Route::resource( '/tahunakademik' , 'App\Http\Controllers\tahunakademikController');
Route::resource( '/fakultas' , 'App\Http\Controllers\fakultasController');
Route::resource( '/jadwal' , 'App\Http\Controllers\jadwalController');
Route::resource( '/pemesanan' , 'App\Http\Controllers\pemesananController');



//  php artisan cache:clear,

// Route::get('/kali', 'latihan1@kali');
// Route::get('/bagi', 'latihan1@bagi');

// // Dashboard Admin
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.dashboard');
// });

// // Dashboard Mahasiswa
// Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
//     Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
// });

// // Dashboard Dosen
// Route::middleware(['auth', 'role:dosen'])->group(function () {
//     Route::get('/dashboard-dosen', [DosenController::class, 'index'])->name('dosen.dashboard');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
    Route::get('/krs/create', [KrsController::class, 'create'])->name('krs.create');
    Route::post('/krs', [KrsController::class, 'store'])->name('krs.store');
    Route::get('/krs/{id}/edit', [KrsController::class, 'edit'])->name('krs.edit');
    Route::put('/krs/{id}', [KrsController::class, 'update'])->name('krs.update');
    Route::delete('/krs/{id}', [KrsController::class, 'destroy'])->name('krs.destroy');
});


require __DIR__.'/auth.php';
