<?php

use App\Models\Category;
use App\Models\Post;
use App\User;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
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

        $category_ids = Category::pluck('id')->toArray();

        $user_ids = User::pluck('id')->toArray();

        for ($i=0; $i < 30 ; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->word(5, true);

            $newPost->user_id = Arr::random($user_ids); 

            $newPost->post_date = $faker->dateTime();
            $newPost->post_content = $faker->paragraph(6, true);

            $newPost->category_id = Arr::random($category_ids);

            
            // $newPost->slug = Str::slug( $newPost->title, '-');

            $newPost->save();
        }
    }
}
