<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

//Rutas para auth
Route::get("/crear-cuenta", [\App\Http\Controllers\Auth\RegisterController::class, "index"])->name("crear-cuenta");
Route::post("/crear-cuenta", [\App\Http\Controllers\Auth\RegisterController::class, "store"]);
Route::get("/iniciar-sesion", [\App\Http\Controllers\Auth\RegisterController::class, "indexLogin"])->name("iniciar-sesion");
Route::post("/iniciar-sesion", [\App\Http\Controllers\Auth\RegisterController::class, "login"]);
