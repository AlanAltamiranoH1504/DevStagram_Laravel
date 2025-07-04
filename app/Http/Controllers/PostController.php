<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostSaveRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("posts.index");
    }

    public function findAllPosts()
    {
        $usuarionInSession = auth()->user();
        $idUsuario = $usuarionInSession['id'];
        try {
            $posts = Post::where(
                "user_id", $idUsuario
            )->orderBy("created_at", "desc")->get();
            return response()->json($posts);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error en listado de posts",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function findUsuario($nombre)
    {
        $usuario = User::with(["posts", "followers"])->where([
            "username" => $nombre
        ])->first();

        return view("posts.findUsuario", [
            "usuario" => $usuario
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostSaveRequest $request)
    {
        $data = $request->validated();
        try {
            $usuarioEnSesion = auth()->user();
            $userId = $usuarioEnSesion['id'];
            Post::create([
                "title" => $data["titulo"],
                "description" => $data['descripcion'],
                "imagen" => $data["idImagen"],
                "user_id" => $userId
            ]);
            return response()->json([
                "message" => "Post creado correctamente.",
                "status" => 201
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error en la creacion del post.",
                "message" => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with("user")->find($id);
        //Verificacion de existencia del post
//        if (!$post) {
//            return view("errors.404");
//        }
//        //Verificacion de propiedad del post
//        $idUsuarioEnSesion = auth()->user()->id;
//        if ($idUsuarioEnSesion !== $post->user_id) {
//            return view("errors.403");
//        }
        return view("posts.show", [
            "nombrePagina" => $post->title
        ]);
    }

    public function findById($id)
    {
        try {
            $post = Post::with("user", "comentarios.user", "likes")->find($id);
            return response()->json($post);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error en la busqueda de post con id: " . $id,
                "message" => $e->getMessage()
            ]);
        }
    }

    public function usuarioEnSesion()
    {
        if (auth()->user()) {
            return response()->json([
                "usuario" => auth()->user()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $post = Post::with("user")->find($id);
            $post->delete();
            //Eliminacion de imagen
            Storage::disk("public")->delete($post->imagen);

            return response()->json([
                "message" => "Post eliminado correctamente"
            ]);
        }catch (\Exception $e) {
            return response()->json([
                "error" => "Error en la eliminacion del post."
            ]);
        }
    }
}
