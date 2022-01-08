<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName'=>$this->faker->firstName,
            'lastName'=>$this->faker->lastName,
            'city'=>$this->faker->city,
            'email'=>$this->faker->email,
        ];
    }
}
