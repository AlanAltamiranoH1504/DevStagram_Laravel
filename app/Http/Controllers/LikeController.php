<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeSaveRequest;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(LikeSaveRequest $request)
    {
        $data = $request->validated();
        try {
            $usuarioEnSesion = auth()->user()->id;
            Like::create([
                "user_id" => $usuarioEnSesion,
                "post_id" => $data["post_id"]
            ]);
            return response()->json([
                "message" => "Like guardado correctamente"
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
