<?php

use App\Models\Album;
use Illuminate\Http\UploadedFile;

beforeEach(function () {
    authenticate();
});

test('can see create', function () {
    $this
        ->get(route('tags.create'))
        ->assertOk()
        ->assertViewIs('admin.tags.create');
});

test('can create tag', function () {

    $title = $this->faker->title;

    $data = [
        'title' => $title,
        'description' => $this->faker->sentence
    ];

    $this->post(route('tags.store'), $data)
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('tags.index'));

    $this->assertDatabaseHas('tags', ['title' => $title]);
});

test('cannot store tag with missing data', function () {
    $this->post(route('tags.store'), [])
        ->assertSessionHasErrors([
            'title'
        ]);
});

test('cannot store tag without title', function () {
    $this->post(route('tags.store'))
        ->assertSessionHasErrors([
            'title'
        ]);

});

test('cannot store album without tag', function () {
    $this->post(route('tags.store'), [
        'title' => $this->faker->title
    ]);
});


