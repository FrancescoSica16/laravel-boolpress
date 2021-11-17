<?php

use App\Models\UserInfo;
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
            //creo utente
            $newUser = new User();
            
            $newUser->name = $faker->userName();
            $newUser->email = $faker->safeEmail();
            $newUser->password = $faker->password(9,14);
            $newUser->save();

            //creo user info
            $newUserInfo = new UserInfo();
            $newUserInfo->user_id = $newUser->id;
            $newUserInfo->address = $faker->address();
            $newUserInfo->contry = $faker->country();
            $newUserInfo->phone = $faker->phoneNumber();

            $newUserInfo->save();

        }

        $user = new User();
        $user->name = 'Francesco';
        $user->email = 'fra@gmail.com';
        $user->password = 'Francesco16';
        $user->save();
    }


}
