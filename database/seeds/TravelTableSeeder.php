<?php

use Illuminate\Database\Seeder;

use App\Models\Travel;

use Illuminate\Support\Str;

use Faker\Generator as Faker;

class TravelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) { 
            $newTravel = new Travel();
            $newTravel->location = $faker->location;
            $newTravel->date_start = $faker->date();
            $newTravel->date_end = $faker->date();
            $newTravel->price = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 99);

            $newTravel->slug = Str::slug( $newTravel->location.$newTravel->price , '-');

            $newTravel->save();
        }
    }
}
