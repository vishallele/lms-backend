<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAuthMeta>
 */
class UserAuthMetaFactory extends Factory
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
            'user_external_id' => Str::random(10),
            'access_token' => Str::random(40),
            'refresh_token' => Str::random(40),
            'id_token' => Str::random(40),
        ];
    }
}
