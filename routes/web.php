<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
// use App\Models\Post;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Mila",
        "email" => "mila@mila.id",
        "image" => "naruto.png"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

// halaman single post, yg didalam{} walopun kita ganti jadi slug, dy tetap nyari id
// Route::get('posts/{post}', [PostController::class, 'show']);

// klo gini baru dy nyari slug
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Route::get('/categories/{category:slug}', function(Category $category) {
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category','author')
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author) {
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' > 'posts',
//         // karna route model binding, pake load buat avoid N+1 problem
//         // lazy eager loading
//         'posts' => $author->posts->load('category','author')
//     ]);
// });


Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);