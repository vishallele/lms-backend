<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'Designation' => fake()->text(20),
            'about_user' => fake()->paragraph(),
            'facebook_url' => fake()->url(),
            'twitter_url' => fake()->url(),
            'linkedin_url' => fake()->url(),
            'profile_picture' => fake()->imageUrl(),
        ];
    }
}
