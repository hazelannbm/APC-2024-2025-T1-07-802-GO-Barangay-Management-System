<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'age' => $this->faker->numberBetween(18, 60),
            'birthdate' => $this->faker->date,
            'address' => $this->faker->address,
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Widowed']),
            'religion' => $this->faker->word,
            'spouse_name' => $this->faker->optional()->name,
            'siblings_name' => $this->faker->optional()->name,
            'children_name' => $this->faker->optional()->name,
            'valid_id' => $this->faker->uuid,
            'password' => bcrypt('password'), // Default password for factory-generated users
        ];
    }
}
