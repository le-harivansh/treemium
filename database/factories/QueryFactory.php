<?php

namespace Database\Factories;

use App\Models\Query;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Query>
 */
class QueryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'tel' => substr(str_shuffle('0123456789'), 0, rand(7, 14)),
            'message' => fake()->text(),
        ];
    }
}
