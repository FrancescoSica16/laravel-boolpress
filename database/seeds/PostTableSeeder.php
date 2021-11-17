<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Post;

use Faker\Generator as Faker;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {    

        $categories_id = Category::pluck('id')->toArray();

        for ($i=0; $i < 10 ; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->word(5, true);
            $newPost->author = $faker->name();
            $newPost->post_date = $faker->dateTime();
            $newPost->post_content = $faker->paragraph(6, true);

            $newPost->category_id = Arr::random($categories_id);
            // $newPost->slug = Str::slug( $newPost->title, '-');

            $newPost->save();
        }
    }
}
