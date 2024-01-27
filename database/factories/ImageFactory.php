<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = image::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'image_file_path' => UploadedFile::fake()->image('logo.png')
        ];
    }
}
