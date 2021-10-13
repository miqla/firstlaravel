<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // mt_rand(min, max) = utk membangkitkan bilangan random
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),

            // 'body' => $this->faker->paragraph(mt_rand(5,10)),    5 sampai 10 kata  
            // 'body' => $this->faker->paragraphs(mt_rand(5,10)),    kalo gini error, karna paragraphs bentuknya array  
            
            // biar tiap paragraph nya dibungkus pake <p> </p>
            // 'body' => '<p>' . implode('</p><p>',$this->faker->paragraphs(mt_rand(5,10))) . '</p>',    5 sampai 10 paragraph  (js join / implode(delimiter))

            // 'body' => collect($this->faker->paragraphs(mt_rand(5,10)))
            //             ->map(function($p){
            //                 return "<p>$p</p>";
            //             }),                              sda

            // arrow function, syntax baru dari php, sda
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))
                        ->map(fn($p) => "<p>$p</p>")
                        ->implode(''),  

            'user_id' => mt_rand(1,10),
            'category_id' => mt_rand(1,2)
        ];
    }
}
