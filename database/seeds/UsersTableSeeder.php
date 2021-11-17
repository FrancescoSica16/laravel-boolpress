<?php

use Illuminate\Database\Seeder;

use App\User;
use Faker\Generator as Faker;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) { 
            $newUser = new User();
            
            $newUser->name = $faker->userName();
            $newUser->email = $faker->safeEmail();
            $newUser->password = $faker->password(9,14);
            $newUser->save();
        }

        $user = new User();
        $user->name = 'Francesco';
        $user->email = 'fra@gmail.com';
        $user->password = 'Francesco16';
        $user->save();
    }


}
