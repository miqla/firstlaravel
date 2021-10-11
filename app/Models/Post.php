<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",            
            "slug" => "judul-post-pertama",
            "author" => "Ipsum Mulia",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti harum aperiam perspiciatis repudiandae, magnam dolore magni eveniet natus, optio tenetur ea pariatur esse? Explicabo culpa magnam qui blanditiis dolore id, officiis quo maiores consectetur minima tenetur libero sapiente facilis a provident vitae in doloremque quos quisquam modi illo natus! Reprehenderit suscipit velit animi? Odio reprehenderit nemo omnis ex aut excepturi, commodi sit iure sint! Perspiciatis voluptatibus earum sunt deleniti voluptatum molestiae dolorem voluptatem nihil natus odio nesciunt, consequuntur ab. Amet?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",        
            "author" => "Agus Lorem",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, adipisci sint? Quibusdam, in culpa! Quam dicta, nam porro dignissimos eos provident aliquid dolore nisi architecto assumenda nihil fugiat voluptatibus incidunt enim omnis qui veritatis voluptates illo sapiente modi commodi alias mollitia. Exercitationem velit maxime magni, dolores ducimus aspernatur amet reiciendis incidunt ipsam eum, sapiente eligendi, recusandae asperiores voluptas. Veritatis iusto placeat nesciunt eos, blanditiis nostrum quia. Dolorum natus quaerat temporibus tempora eum cum nam tenetur laborum facere, ab illo assumenda, eveniet ducimus magnam. Velit nesciunt impedit expedita esse in quae consequuntur aliquid fugiat assumenda error, quidem, magnam dolorem recusandae placeat."
        ]
    ];

    public static function all()
    {
        // karna dy static jadi pake self
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        // $posts = self::$blog_posts;
        $posts = static::all();
            // $post = [];
            // foreach($posts as $p) {
            //     if($p["slug"] === $slug) {
            //         $post = $p;
            //     }
            // }

            return $posts->firstWhere('slug', $slug);
        }
}
