<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.FormLogin");
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $usuarioDB = User::where("email", $data["email"])->first();

        if (!auth()->attempt($data)){
            return response()->json([
                "msg" => "Credenciales Incorrectas",
                "status" => 401
            ]);
        }
        return response()->json([
            "status" => 200,
            "msg" => "Autenticacion Exitosa"
        ]);
    }

    public function logout()
    {
        try {
            auth()->logout();
            return response()->json([
                "status" => 200,
                "msg" => "Logout Exitosa"
            ]);
        }catch (\Exception $e){
            return response()->json([
                "status" => 500,
                "msg" => "Ocurrio un error al intentar logout"
            ]);
        }
    }
}
