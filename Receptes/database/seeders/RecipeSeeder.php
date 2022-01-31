<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
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

            $imatge = $faker->image(storage_path('app\public'), 600, 400, 'cats');
            $imatge = explode('\\',$imatge);
            $imatge = 'storage/'.end($imatge);

            Recipe::insert([
                'category_id' => rand(1, 10),
                'user_id' => rand(2, 11),
                'name' => $faker->word(),
                'image' => $imatge,
                'description' => $faker->paragraph(3, true),
                'prep_time' => rand(20, 90)
            ]);

        }
    }
}
