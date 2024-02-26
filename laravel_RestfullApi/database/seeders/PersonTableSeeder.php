<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 50; $i++) { 
            # code...
            Person::create([
                'firstname' => $faker->name,
                'last_name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'city' => $faker->city,
            ]);
        }
    }
}
