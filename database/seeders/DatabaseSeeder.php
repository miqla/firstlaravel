<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();    //gaperlu pake namespace karna diatas udah pake use

        // utk table user
        // User::create([
        //     'name' => 'Mila Rabbani',
        //     'email' => 'mila@mila.id',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Ipsum Mulia',
        //     'email' => 'ipsum@gmail.id',
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programing'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure fuga commodi odio culpa hic possimus atque minima consectetur sunt!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure fuga commodi odio culpa hic possimus atque minima consectetur sunt! Aliquid iure accusantium provident, sed repellendus commodi inventore maiores dolorum voluptas labore veniam qui, minus minima ad placeat dolor nam suscipit quos consequuntur. Facere, deleniti recusandae a quasi asperiores molestiae aperiam tenetur nemo. Unde eius reprehenderit obcaecati quisquam, molestiae sapiente voluptatibus odit dignissimos distinctio, debitis, aperiam eligendi veritatis exercitationem facilis quos accusamus dolorum placeat quo neque quod. Minima qui iste molestiae nostrum maxime, veniam aliquam nisi consectetur tempora laudantium laborum, quod vero voluptate eveniet distinctio nesciunt harum neque facilis delectus veritatis?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure fuga commodi odio culpa hic possimus atque minima consectetur sunt!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure fuga commodi odio culpa hic possimus atque minima consectetur sunt! Aliquid iure accusantium provident, sed repellendus commodi inventore maiores dolorum voluptas labore veniam qui, minus minima ad placeat dolor nam suscipit quos consequuntur. Facere, deleniti recusandae a quasi asperiores molestiae aperiam tenetur nemo. Unde eius reprehenderit obcaecati quisquam, molestiae sapiente voluptatibus odit dignissimos distinctio, debitis, aperiam eligendi veritatis exercitationem facilis quos accusamus dolorum placeat quo neque quod. Minima qui iste molestiae nostrum maxime, veniam aliquam nisi consectetur tempora laudantium laborum, quod vero voluptate eveniet distinctio nesciunt harum neque facilis delectus veritatis?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
    }
}
