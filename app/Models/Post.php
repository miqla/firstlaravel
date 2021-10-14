<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    // biar field table bisa diisi pake create
    // protected $fillable = ['title', 'excerpt', 'body'];

    // guarded = yg gabole diisi, sisanya boleh
    protected $guarded = ['id'];
    // mindahin with dari controller post, utk avoid N+1 problem
    protected $with = ['category', 'author'];

    // nama scopenya bebas, klo sekarang filter
    public function scopeFilter($query, array $filters)
    {
        // jika ada sesuatu yg ditulis di kolom pencarian
        // jika ada maka ambil..
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //                  ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        // when = pengganti if       $filters['search'] akan masuk ke $search   sda
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('body', 'like', '%' . $search . '%');
        });

        // whereHas = join table, fitur laravel
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use($category){
                $query->where('slug', $category);
            });
        });
        // kalo ada satu, jalanin satu, klo ada dua"nya jalanin dua"nya

        // sda, tpi yg ini pake arrow function
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }


    // menghubungkan ke model Category
    public function category()
    {
        // hubungan post ke category = one to one
        return $this->belongsTo(Category::class);
    }

    // menghubungkan ke model user
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // biar routes otomatis nyari slug, bukan id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
