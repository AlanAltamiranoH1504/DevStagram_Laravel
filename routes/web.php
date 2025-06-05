<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

//Rutas para auth
Route::get("/crear-cuenta", [\App\Http\Controllers\Auth\RegisterController::class, "index"])->name("crear-cuenta");
Route::post("/crear-cuenta", [\App\Http\Controllers\Auth\RegisterController::class, "store"]);
Route::get("/iniciar-sesion", [\App\Http\Controllers\LoginController::class, "index"])->name("login");
Route::post("/iniciar-sesion", [\App\Http\Controllers\LoginController::class, "login"]);

//Rutas para posts
Route::get("/muro", [\App\Http\Controllers\PostController::class, "index"])->name("home-devStagram")->middleware("auth");
Route::post("/cerrar-sesion", [\App\Http\Controllers\LoginController::class, "logout"])->name("cerrar-sesion");
