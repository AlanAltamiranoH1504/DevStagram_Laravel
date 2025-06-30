<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userInSession = auth()->user()->id;
        $userToFollow = $request["userPerfil"];

        //Verificacion de usuario a seguir existe
        $userToFollowPerfil = User::where([
            "username" => $userToFollow
        ])->first();
        if (is_null($userToFollowPerfil)) {
            return response()->json([
                "error" => "Usuario con username ".$userToFollow." no encontrado.",
                "status" => 409
            ]);
        }
        $userToFollowPerfil->followers()->attach($userInSession);
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $userInSession = auth()->user()->id;
        $userToFollow = $request["userPerfil"];

        //Verificacion de usuario a unfollow
        $userToFollowPerfil = User::where([
            "username" => $userToFollow
        ])->first();
        if (is_null($userToFollowPerfil)) {
            return response()->json([
                "error" => "Usuario con username ".$userToFollow." no encontrado.",
                "status" => 409
            ]);
        }
        $userToFollowPerfil->followers()->detach($userInSession);
        return back();
    }
}
