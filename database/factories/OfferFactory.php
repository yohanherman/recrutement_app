<?php

namespace Database\Factories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Offer::class;

    public function definition(): array
    {
        return [
            'Title_offer' => fake()->sentence(),
            'Company_name' => fake()->company(),
            'Location' => fake()->city(),
            'Employement_type_id' => fake()->numberBetween(1,3),
            'Salary_range' => '35k-50k',
            'user_id' => 1
        ];
    }
}
