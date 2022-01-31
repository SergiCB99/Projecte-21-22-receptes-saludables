<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        User::insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        $faker = \Faker\Factory::create();

        for ($i = 0;$i < 10;$i++) {

            User::insert([
                'name' => $faker->name(),
                'email' => $faker->safeEmail(),
                'password' => bcrypt('user')
            ]);

        }
    }
}
