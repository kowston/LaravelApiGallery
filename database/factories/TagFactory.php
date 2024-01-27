<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = tag::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence
        ];
    }
}
