<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route("login");
        }else {
            $ids = auth()->user()->following->pluck("id")->toArray();
            $postMostrar = Post::whereIn("user_id", $ids)->orderBy("created_at", "DESC")->get();

            return view("principal", [
                "posts" => $postMostrar
            ]);
        }
    }
}
