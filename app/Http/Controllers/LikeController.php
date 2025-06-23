<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeSaveRequest;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(LikeSaveRequest $request)
    {
        $data = $request->validated();
        try {
            $usuarioEnSesion = auth()->user()->id;
            //Busqueda like en el post
            $post = Post::with("likes")->find($data["post_id"]);
            foreach($post->likes as $like){
                if ($like->user_id == $usuarioEnSesion){
                    $like->delete();
                    return response()->json([
                        "message" => "El like se ha eliminado correctamente.",
                        "like" => false
                    ]);
                }
            }

            //Guardado de like si no existia
            Like::create([
                "user_id" => $usuarioEnSesion,
                "post_id" => $data["post_id"]
            ]);
            return response()->json([
                "message" => "Like guardado correctamente",
                "like" => true
            ]);
        }catch (\Exception $e){
            return response()->json([
                "error" => "Error en el guardado del like al post",
                "message" => $e->getMessage(),
                "code" => $e->getCode(),
                "line" => $e->getLine()
            ]);
        }
    }
}
