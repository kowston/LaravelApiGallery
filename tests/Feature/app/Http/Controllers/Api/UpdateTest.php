<?php

use App\Models\Album;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\patchJson;

beforeEach(function () {
    authenticate();
});

test ('can update an album', function () {
   $album = Album::factory()->create();

   $title = $this->faker->sentence;

   $data = [
       'title' => $title,
       'description' => $this->faker->sentence,
       'cover_file_path' => UploadedFile::fake()->image('logo.png')
   ];

   patchJson(route('api.albums.update', $album), $data)
       ->assertOk();

   assertDatabaseHas($album, ['title' => $title]);
});

test ('cannot update with invalid data', function () {
   $album = Album::factory()->create();
   $data = [];

   patchJson(route('api.albums.update', $album), $data)
       ->assertJsonValidationErrors([
           'title' => 'The title field is required.'
       ]);
});
