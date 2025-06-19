<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentarioSaveRequest;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(ComentarioSaveRequest $request)
    {
        $data = $request->validated();
        try {
            Comentario::create([
                "post_id" => $data["post_id"],
                "user_id" => auth()->user()->id,
                "comentario" => $data["comentario"]
            ]);
            return  response()->json([
                "message" => "Comentario agregado",
                "status" => 201
            ]);
        }catch (\Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "error_code" => $e->getCode()
            ]);
        }
    }
}
