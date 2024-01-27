<?php

use App\Models\Album;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

beforeEach(function () {
    authenticate();
});

test ('can store album', function () {

    $title = $this->faker->title;

    $data = [
        'title' => $title,
        'description' => $this->faker->sentence,
        'cover_file_path' => UploadedFile::fake()->image('logo.png')
    ];

    postJson(route('api.albums.store'), $data)
         ->assertCreated();

    assertDatabaseHas('albums', ['title' => $title]);
});

test ('Ensure title and cover_file_path fields are required', function () {

    postJson(route('api.albums.store'), [])
        ->assertJsonValidationErrors([
            'title' => 'The title field is required.',
            'cover_file_path' => 'The cover file path field is required.'
        ]);
});

test ('cannot store album without title', function () {
    postJson(route('api.albums.store', [
        'cover_file_path' => UploadedFile::fake()->image('logo.png')
    ]))
        ->assertJsonValidationErrors([
            'title' => 'The title field is required.'
            ]
        );
});

test ('cannot store album without image', function () {
   postJson(route('api.albums.store', [
       'title' => $this->faker->title
   ]))
    ->assertJsonValidationErrors([
        'cover_file_path' => 'The cover file path field is required.'
    ]);
});










