<?php

use App\Http\Controllers\ProfileController;
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
    Route::get('/petugas', [ProfileController::class, 'indexPetugas'])->name('petugas.index');

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
