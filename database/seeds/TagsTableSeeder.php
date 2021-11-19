<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tagNames = ['Frontend', 'Backend', 'Machine Learning', 'Design', 'Funny', 'Fullstack', 'Coding Challange'];

        foreach ($tagNames as $name) {

            $newTag = new Tag();
            $newTag->name = $name;
            $newTag->color = $faker->hexColor();

            $newTag->save();

        }
    }
}
