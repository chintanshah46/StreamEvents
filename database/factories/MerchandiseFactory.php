<?php

namespace Database\Factories;

use App\Models\Merchandise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchandise>
 */
class MerchandiseFactory extends Factory
{
    protected $model = Merchandise::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'          => fake()->word(),
            'price'         => fake()->randomFloat(2, 0, 99),
            'is_active'     => 1,
            'created_at'    => fake()->dateTimeBetween('-3 month', '-1 day'),
            'updated_at'    => fake()->dateTimeBetween('-3 month', '-1 day')
        ];
    }
}
