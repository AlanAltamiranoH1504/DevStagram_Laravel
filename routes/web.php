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

Route::middleware("auth")->group(function (){
    Route::get("/muro", [\App\Http\Controllers\PostController::class, "index"])->name("home-devStagram");
    Route::get("/posts/create", [\App\Http\Controllers\PostController::class, "create"])->name("post_create");
    Route::post("/imagenes", [\App\Http\Controllers\ImagenController::class, "store"])->name("save_imagen");
});
//Route::get("/muro", [\App\Http\Controllers\PostController::class, "index"])->name("home-devStagram")->middleware("auth");
Route::get("/muro/{nombre}", [\App\Http\Controllers\PostController::class, "findUsuario"])->name("findUsuario");
Route::post("/cerrar-sesion", [\App\Http\Controllers\LoginController::class, "logout"])->name("cerrar-sesion");
