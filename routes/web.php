<?php

use App\Http\Controllers\ColegiaturaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ColegiaturaController::class, 'index'])->name('home');
Route::get('/solicitud', [ColegiaturaController::class, 'create'])->name('colegiatura.create');
Route::post('/solicitud', [ColegiaturaController::class, 'store'])->name('colegiatura.store');
Route::get('/confirmacion/{id}', [ColegiaturaController::class, 'confirmation'])->name('colegiatura.confirmation');
Route::get('/seguimiento', [ColegiaturaController::class, 'track'])->name('colegiatura.track');
Route::post('/seguimiento', [ColegiaturaController::class, 'status'])->name('colegiatura.status');

// Registro de documentos
Route::get('/registro', [ColegiaturaController::class, 'registro'])->name('colegiatura.registro');
Route::post('/registro', [ColegiaturaController::class, 'storeRegistro'])->name('colegiatura.registro.store');
