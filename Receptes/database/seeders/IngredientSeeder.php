<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
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

            Ingredient::insert([
               'recipe_id' => rand(1,10),
                'ingredient' => $faker->word()
            ]);

        }
    }
}
