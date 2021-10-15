<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "username" => "",
            // filter di post model
            // get diganti jadi paginate(jumlah yg ditampilkan tiap halaman)
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
            // withQueryString() = bawa apapun yg ada di query string sebelumnya
            
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
