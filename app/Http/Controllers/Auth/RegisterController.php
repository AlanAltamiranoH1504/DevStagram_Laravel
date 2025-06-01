<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    //Form de creacion de cuenta
    public function index()
    {
        return view("auth.FormCrearCuenta");
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        $usuario = Usuario::create($data);
        return response()->json([
            "msg" => "Usuario creado correctamente",
            "status" => 200
        ]);
    }
}
