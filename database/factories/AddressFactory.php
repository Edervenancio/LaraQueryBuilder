<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
            return [
                'user' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
                'address' => $this->faker->streetAddress(),
                'number' => $this->faker->randomNumber(4),
                'complement' => $this->faker->streetName(),
                'zipcode' => $this->faker->postcode(),
                'city' => $this->faker->city(),
                'state' => $this->faker->city(),
                'status' => rand(0, 1),
            ];
    }
}
