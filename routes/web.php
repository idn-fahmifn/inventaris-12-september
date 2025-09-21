<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Group Admin
Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {

    // dashboard
    Route::get('/dashboard', [ProfileController::class, 'dashboardAdmin'])
    ->name('dashboard');

    // index dari data petugas
    Route::get('/petugas', [ProfileController::class, 'indexPetugas'])
    ->name('petugas.index');
    Route::post('/petugas', [ProfileController::class, 'storePetugas'])
    ->name('petugas.store');


    // route Ruangan
    Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
    Route::post('/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');
    Route::get('/ruangan/{param}', [RuanganController::class, 'detail'])->name('ruangan.detail');


});

// Group Petugas
Route::prefix('petugas')->middleware(['auth', 'verified'])->group(function () {

    // dashboard
    Route::get('/dashboard', [ProfileController::class, 'dashboardPetugas'])
    ->name('dashboard.petugas');

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
