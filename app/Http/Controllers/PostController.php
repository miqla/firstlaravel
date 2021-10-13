<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "All Posts",
            // "posts" => Post::all()
            // latest() biar diurut berdasarkan yg trakhir dipost
            "posts" => Post::with(['author','category'])->latest()->get()
            // pake with to avoid N+1 problem, eager loading
        ]);
    }

    // show(nama model, variabel yg dikirim dari routenya)
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            // "post" => Post::find($id)
            "post" => $post
        ]);
    }
}
