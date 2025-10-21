<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgresProyekController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/progres', [ProgresProyekController::class, 'index'])->name('progres.index');
Route::get('/progres-proyek', [ProgresProyekController::class, 'index'])->name('progres.index');
Route::post('/progres-proyek', [ProgresProyekController::class, 'store'])->name('progres.store');
Route::delete('/progres-proyek/{id}', [ProgresProyekController::class, 'destroy'])->name('progres.destroy');