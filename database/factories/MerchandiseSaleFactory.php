<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\EventUser;
use App\Models\Merchandise;
use App\Models\MerchandiseSale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MerchandiseSale>
 */
class MerchandiseSaleFactory extends Factory
{
    protected $model = MerchandiseSale::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_user_id'     => EventUser::factory()->create(), 
            'merchandise_id'    => Merchandise::all()->random(), 
            'currency_id'       => Currency::all()->random(), 
            'amount'            => fake()->randomFloat(2, 0, 300),
            'has_read'          => 0,
            'created_at'        => fake()->dateTimeBetween('-3 month', '-1 day'),
            'updated_at'        => fake()->dateTimeBetween('-3 month', '-1 day')
        ];
    }
}
