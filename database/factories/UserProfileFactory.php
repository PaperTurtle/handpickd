<?php

namespace Database\Factories;

use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    protected $model = UserProfile::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'bio' => $this->faker->paragraph,
            'profile_picture' => $this->faker->imageUrl(640, 480, 'people'),
        ];
    }
}
