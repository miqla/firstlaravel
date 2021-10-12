<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

     // menghubungkan ke model Post
     public function posts()
     {
         // hubungan category ke post = one to many
         return $this->hasMany(Post::class);
     }
}
