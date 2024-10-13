<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            // 'Title_offer' => $this->faker->sentence,
            // 'company_name' => $this->faker->company,
            // 'Location' => $this->faker->city,
            // 'Employements_type_id' => $this->faker->random_int(),
            // 'Salary_range' => '35k-50k',
            // 'user_id' => 1
        ];
    }
}
