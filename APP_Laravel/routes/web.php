<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\NfcController; // Asegúrate de que este esté aquí
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta genérica que Laravel usa por defecto al loguearse
// La dejaremos para que redirija según el rol en el futuro
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // --- GRUPO PARA DOCTORES ---
   // Route::middleware(['role:doctor'])->group(function () {
        // Esta es la ruta principal del doctor. 
       
        Route::get('/doctor/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
        
        Route::get('/doctor/cita/{id}', [CitaController::class, 'show'])->name('citas.show');
        Route::put('/doctor/cita/{id}', [CitaController::class, 'update'])->name('citas.update');
   // });

    // --- GRUPO PARA PACIENTES ---
    Route::middleware(['role:paciente'])->group(function () {
        Route::get('/paciente/mis-citas', [CitaController::class, 'index'])->name('paciente.citas');
    });

    // Rutas de Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';