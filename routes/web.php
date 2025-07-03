<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\AuthenticatedSessionController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/tanaman', [JenisController::class, 'index'])->name('jenis_tanaman.index');
Route::get('/edit/{id}', [JenisController::class, 'edit'])->name('jenis_tanaman.edit');
Route::put('/update/{id}', [JenisController::class, 'update'])->name('jenis_tanaman.update');
Route::get('/pdf/{id}', [AdminController::class, 'exportPDF'])->name('pdf');
Route::delete('/tanaman/{id}', [AdminController::class, 'destroy'])->name('tanaman.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';