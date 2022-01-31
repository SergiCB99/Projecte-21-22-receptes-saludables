<?php

namespace Database\Seeders;

use App\Models\Steps;
use Illuminate\Database\Seeder;

class StepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for ($i = 0;$i < 10;$i++) {

            Steps::insert([
                'recipe_id' => rand(1,10),
                'step' => $faker->sentence()
            ]);

        }

    }
}
