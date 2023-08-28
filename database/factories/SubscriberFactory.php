<?php

namespace Database\Factories;

use App\Models\EventUser;
use App\Models\Subscriber;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscriber>
 */
class SubscriberFactory extends Factory
{
    protected $model = Subscriber::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_user_id'     => EventUser::factory()->create(), 
            'subscription_id'   => Subscription::all()->random(), 
            'has_read'          => 0,
            'created_at'        => fake()->dateTimeBetween('-3 month', '-1 day'),
            'updated_at'        => fake()->dateTimeBetween('-3 month', '-1 day')
        ];
    }
}
