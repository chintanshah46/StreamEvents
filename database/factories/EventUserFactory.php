<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EventUser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventUser>
 */
class EventUserFactory extends Factory
{
    protected $model = EventUser::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'       => User::all()->random(),
            'name'          => fake()->name(),
            'username'      => fake()->unique()->userName(),
            'email'         => fake()->unique()->safeEmail(),
            'password'      => fake()->password(),
            'created_at'    => fake()->dateTimeBetween('-3 month', '-1 day'),
            'updated_at'    => fake()->dateTimeBetween('-3 month', '-1 day')
        ];
    }
}
