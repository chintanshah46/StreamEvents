<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Donation;
use App\Models\EventUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    protected $model = Donation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_user_id'     => EventUser::factory()->create(), 
            'currency_id'       => Currency::all()->random(), 
            'amount'            => fake()->randomFloat(2, 0, 150),
            'donation_message'  => fake()->sentence(),
            'has_read'          => 0,
            'created_at'        => fake()->dateTimeBetween('-3 month', '-1 day'),
            'updated_at'        => fake()->dateTimeBetween('-3 month', '-1 day')
        ];
    }
}
