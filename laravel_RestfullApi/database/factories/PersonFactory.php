<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'firstname' => 'adejumobi',
            'last_name' => 'toluwanimi',
            'phone' => '09130389749',
            'email' => 'adejumobitoluwanimi2@gmail.com',
            'city' => 'lagos',
        ];
    }
}
