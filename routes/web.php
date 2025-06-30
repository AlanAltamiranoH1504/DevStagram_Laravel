<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])->name("home");

//Rutas para auth
Route::get("/crear-cuenta", [\App\Http\Controllers\Auth\RegisterController::class, "index"])->name("crear-cuenta");
Route::post("/crear-cuenta", [\App\Http\Controllers\Auth\RegisterController::class, "store"]);
Route::get("/iniciar-sesion", [\App\Http\Controllers\LoginController::class, "index"])->name("login");
Route::post("/iniciar-sesion", [\App\Http\Controllers\LoginController::class, "login"]);

//Rutas para posts

Route::middleware("auth")->group(function (){
    //Rutas de muro
    Route::get("/muro", [\App\Http\Controllers\PostController::class, "index"])->name("home-devStagram");

    //Rutas para usuario
    Route::get("/user/edit", [\App\Http\Controllers\UserController::class, "show"])->name("user_show");
    Route::put("/user/update", [\App\Http\Controllers\UserController::class, "update"])->name("user_update");
    Route::get("/user/findAllSiguiendo", [\App\Http\Controllers\UserController::class, "findAllSiguiendo"])->name("user_findAllSiguiendo");

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

    //Rutas para likes
    Route::post("/likes/save", [\App\Http\Controllers\LikeController::class, "store"])->name("like_save");

    //Rutas para followers
    Route::post("/follow", [\App\Http\Controllers\FollowerController::class, "store"])->name("user_follow");
    Route::delete("/unfollow", [\App\Http\Controllers\FollowerController::class, "destroy"])->name("user_unfollow");
});
Route::get("/posts/{id}/{title}", [\App\Http\Controllers\PostController::class, "show"])->name("post_show");
Route::get("/posts/{id}", [\App\Http\Controllers\PostController::class, "findById"])->name("post_findById");

Route::get("/muro/{nombre}", [\App\Http\Controllers\PostController::class, "findUsuario"])->name("findUsuario");
Route::post("/cerrar-sesion", [\App\Http\Controllers\LoginController::class, "logout"])->name("cerrar-sesion");
