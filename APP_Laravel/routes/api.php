<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NfcController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\DeviceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['auth:sanctum', RoleMiddleware::class . ':doctor'])->group(function () {
        Route::post('/validar-nfc', [NfcController::class, 'verificacion']);
    });


// El ESP32 golpea esta puerta para decir quién llegó
Route::post('/validar-nfc', [NfcController::class, 'verificacion']);

//El Dashboard del Doctor consulta esta puerta cada 2 segundos
Route::get('/check-nfc-status', [NfcController::class, 'checkStatus']);

// Ruta para que la ESP32 se registre o actualice su información en la BD
Route::post('/esp32/acceso', [DeviceController::class, 'setup']);

// Ruta para que la ESP32 revise si esta registrada y obtener las credenciales WiFi 
Route::get('/esp32/credenciales/{mac}', [DeviceController::class, 'getCredentials']); 