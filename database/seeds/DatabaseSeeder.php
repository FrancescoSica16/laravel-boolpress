<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
            'UsersTableSeeder',
            'RoleSeeder',
            'RoleUserSeeder',
            'CategoriesTableSeeder',
            'TagsTableSeeder',
            'PostTableSeeder',
            'PostTagSeeder'           
        ]);
    }
}
