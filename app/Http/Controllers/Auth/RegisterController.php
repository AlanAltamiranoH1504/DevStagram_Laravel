<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        $usuario = User::create([
            "name" => $data["name"],
            "username" => Str::slug($data["username"]),
            "email" => $data["email"],
            "password" => Hash::make($data["password"])
        ]);
        return response()->json([
            "msg" => "Usuario creado correctamente",
            "status" => 200
        ]);
    }

    public function indexLogin()
    {
        return view("auth.FormLogin");
    }

    public function login(LoginRequest $request) {

        $data = $request->validated();
        $usuarioDB = User::where("email", $data["email"])->first();


        return response()->json([
            "msg" => "Llega al controlador",
            "status" => 200,
            "data" => $request,
            "usuario" => $usuarioDB
        ]);
    }
}
