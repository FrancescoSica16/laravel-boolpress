<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categoryNames = ['HTML','CSS', 'JS', 'PHP','MYSQL','VueJS','LARAEL'];

        foreach ($categoryNames as $categoryName) {
            
            $newCategory = new Category();
            $newCategory->name = $categoryName;
            $newCategory->slug = Str::slug($categoryName);

            $newCategory->save();
        }
        
    }
}
