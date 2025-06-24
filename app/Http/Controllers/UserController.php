<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $usuario = auth()->user();
        return view("users.show", [
            "user" => $usuario
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        $data = $request->validated();
        try {
            if ($request->hasFile('imagen')) {
                $upload = $request->file('imagen');
                $nombreImagen = Str::random() . '.' . $upload->getClientOriginalExtension();

                // Guardar la imagen tal cual, sin modificar tamaño ni calidad
                Storage::disk('public')->put(
                    $nombreImagen,
                    file_get_contents($upload->getRealPath())
                );

                auth()->user()->update([
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'imagen' => $nombreImagen,
                ]);
            } else {
                auth()->user()->update([
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]);
            }

            return response()->json([
                'imagen' => $nombreImagen ?? null,
                'message' => 'Usuario actualizado correctamente',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error en la actualización de perfil de usuario',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine(),
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
