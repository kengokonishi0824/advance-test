<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'gender' => $this->faker->numberBetween($min = 1, $max = 2),
            'email' => $this->faker->safeEmail(),
            'postcode' => $this->faker->regexify('[1-9]{3}-[0-9]{4}'),
            'address' => $this->faker->prefecture().$this->faker->city().$this->faker->streetAddress(),
            'building_name' => $this->faker->optional()->secondaryAddress(),
            'opinion' => $this->faker->realText(100)
        ];
    }
}
