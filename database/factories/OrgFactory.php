<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Org>
 */
class OrgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // note that users 1=test@example.com, 2=aa and 3=bb
        return [
            'user_id' => $this->faker->randomElement([1, 2, 3]),
            'orgName' => $this->faker->company(),
            'orgType' => $this->faker->jobTitle(),
            'street' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'postalCode' => $this->faker->postcode(),
            'province' => $this->faker->state(),
            'country' => $this->faker->country(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
        ];
    }
}
