<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "phone" => $this->faker->phoneNumber(),
            "mobile" => $this->faker->phoneNumber(),
            "address" => $this->faker->address(),
            "gender" => rand(1, 2),
            "status" => rand(1, 2),
        ];
    }
}
