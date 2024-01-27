<?php

use App\Models\Album;
use Illuminate\Http\UploadedFile;

beforeEach(function () {
    authenticate();
});

test('can see create', function () {
    $this
        ->get(route('images.create'))
        ->assertOk()
        ->assertViewIs('admin.images.create');
});

test('can create image', function () {

    $title = $this->faker->title;

    $data = [
        'title' => $title,
        'description' => $this->faker->sentence,
        'image_file_path' => UploadedFile::fake()->image('logo.png')
    ];

    $this->post(route('images.store'), $data)
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('images.index'));

    $this->assertDatabaseHas('images', ['title' => $title]);
});

test('cannot store image with missing data', function () {
    $this->post(route('images.store'), [])
        ->assertSessionHasErrors([
            'title',
            'image_file_path'
        ]);
});

test('cannot store image without title', function () {
    $this->post(route('images.store'), [
        'image_file_path' => UploadedFile::fake()->image('logo.png')
    ])
        ->assertSessionHasErrors([
            'title'
        ]);

});

test('cannot store album without image', function () {
    $this->post(route('images.store'), [
        'title' => $this->faker->title
    ])
        ->assertSessionHasErrors([
            'image_file_path'
        ]);
});


