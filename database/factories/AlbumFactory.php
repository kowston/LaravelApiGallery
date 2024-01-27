<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'cover_file_path' => UploadedFile::fake()->image('logo.png')
        ];
    }
}
