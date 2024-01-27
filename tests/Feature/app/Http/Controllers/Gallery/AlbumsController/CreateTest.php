<?php

use App\Models\Album;
use Illuminate\Http\UploadedFile;

beforeEach(function () {
    authenticate();
});

test('can see create', function () {
    $this
        ->get(route('albums.create'))
        ->assertOk()
        ->assertViewIs('admin.albums.create');
});

test('can create album', function () {

    $title = $this->faker->title;

    $data = [
        'title' => $title,
        'description' => $this->faker->sentence,
        'cover_file_path' => UploadedFile::fake()->image('logo.png')
    ];

    $this->post(route('albums.store'), $data)
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('albums.index'));

    $this->assertDatabaseHas('albums', ['title' => $title]);
});

test('cannot store album with missing data', function () {
    $this->post(route('albums.store'), [])
        ->assertSessionHasErrors([
            'title',
            'cover_file_path'
        ]);
});

test('cannot store album without title', function () {
    $this->post(route('albums.store'), [
        'cover_file_path' => UploadedFile::fake()->image('logo.png')
    ])
        ->assertSessionHasErrors([
            'title'
        ]);

});

test('cannot store album without image', function () {
    $this->post(route('albums.store'), [
        'title' => $this->faker->title
    ])
        ->assertSessionHasErrors([
            'cover_file_path'
        ]);
});


