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
            "active" => 'posts',

            // latest() biar diurut berdasarkan yg trakhir dipost
            // pake with to avoid N+1 problem, eager loading
            // kasih comment karna udah dipindah ke postmodel
            // "posts" => Post::with(['author','category'])->latest()->get()
            
            "posts" => Post::latest()->get()
            
        ]);
    }

    // show(nama model, variabel yg dikirim dari routenya)
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            // "post" => Post::find($id)
            "active" => 'posts',
            "post" => $post
        ]);
    }
}
