<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba-api', function () {
    return response()->json(['message' => 'API funcionando correctamente']);
});