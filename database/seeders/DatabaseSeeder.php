<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');

        //user seeder
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
            'role' => 10,
        ]);

        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
        ]);

        foreach(range(1, 9) as $_) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->freeEmail,
                'password' => Hash::make('123'),
            ]);
        }

        //restaurant seeder
        $restaurants = collect([]);
        do {
             $restaurants->push($faker->company);
             $restaurants = $restaurants->unique();
        } while ($restaurants->count() < 10);
 
        foreach($restaurants as $restaurant) {
             DB::table('restaurants')->insert([
                 'name' => $restaurant,
                 'code' => rand(111111, 999999),
                 'address' => $restaurant
             ]);
        }

        //menu seeder
        foreach(range(1, 9) as $_) {
            DB::table('menus')->insert([
                'restaurant_id' => rand(0 ,9),
                'name' => $faker->name
            ]);
        }

        //dish seeder
        foreach(range(1, 9) as $_) {
            DB::table('dishes')->insert([
                'menu_id' => rand(0 ,9),
                'name' => $faker->name,
                'description' => 'aprasas ',
                'image' => $faker->imageUrl($width = 640, $height = 480, 'dish') 
            ]);
        }

    }
}
