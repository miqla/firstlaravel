<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // biar field table bisa diisi pake create
    // protected $fillable = ['title', 'excerpt', 'body'];

    // guarded = yg gabole diisi, sisanya boleh
    protected $guarded = ['id'];

    // menghubungkan ke model Category
    public function category()
    {
        // hubungan post ke category = one to one
        return $this->belongsTo(Category::class);
    }
}
