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

    //Rutas para Post
    Route::get("/posts/create", [\App\Http\Controllers\PostController::class, "create"])->name("post_create");
    Route::post("/posts/save", [\App\Http\Controllers\PostController::class, "store"])->name("post_save");
    Route::get("/posts", [\App\Http\Controllers\PostController::class, "findAllPosts"])->name("posts_findAll");
    Route::get("/posts/{id}/{title}", [\App\Http\Controllers\PostController::class, "show"])->name("post_show");
    Route::get("/posts/{id}", [\App\Http\Controllers\PostController::class, "findById"])->name("post_findById");
    Route::get("/user/in/sesion", [\App\Http\Controllers\PostController::class, "usuarioEnSesion"])->name("usuarioEnSesion");
    Route::delete("/posts/{id}", [\App\Http\Controllers\PostController::class, "destroy"])->name("post_destroy");

    //Rutas para imagenes
    Route::post("/imagenes", [\App\Http\Controllers\ImagenController::class, "store"])->name("save_imagen");

    //Rutas comentarios
    Route::post("/comentarios/save", [\App\Http\Controllers\ComentarioController::class, "store"])->name("comentario_save");
});
Route::get("/posts/{id}/{title}", [\App\Http\Controllers\PostController::class, "show"])->name("post_show");
Route::get("/posts/{id}", [\App\Http\Controllers\PostController::class, "findById"])->name("post_findById");

Route::get("/muro/{nombre}", [\App\Http\Controllers\PostController::class, "findUsuario"])->name("findUsuario");
Route::post("/cerrar-sesion", [\App\Http\Controllers\LoginController::class, "logout"])->name("cerrar-sesion");
