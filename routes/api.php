<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\CitaController;
use App\Http\Controllers\Api\AtencionController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Rutas de la API (todas tienen el prefijo /api y el middleware 'api')
Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::get('/clientes/{cliente}/citas', [ClienteController::class, 'citas']);
Route::post('/citas', [CitaController::class, 'store']);
Route::get('/atenciones', [AtencionController::class, 'index']);
Route::post('/atenciones', [AtencionController::class, 'store']);
