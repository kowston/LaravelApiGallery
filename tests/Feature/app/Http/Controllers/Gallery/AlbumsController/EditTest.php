<?php

use App\Models\Album;
use Illuminate\Http\UploadedFile;

beforeEach(function () {
    authenticate();
});

test('can see edit page', function () {

    $album = Album::factory()->create();

    $this
        ->get(route('albums.edit', $album))
        ->assertOk()
        ->assertViewIs('admin.albums.edit')
        ->assertViewHas('album', $album);
});

test ('can update a record', function () {
    $album = Album::factory()->create();

    $title = $this->faker->title;

    $data = [
        'title' => $title,
        'description' => $this->faker->sentence,
        'cover_file_path' => UploadedFile::fake()->image('logo.png')
    ];

    $this->patch(route('albums.update', $album), $data)
         ->assertSessionHasNoErrors()
         ->assertRedirect(route('albums.index'));

    $this->assertDatabaseHas($album, ['title' => $title]);
});

test ('cannot update with invalid data', function () {
    $album = Album::factory()->create();

    $title = 'title of album';

    $data = [];

    $this->patch(route('albums.update', $album), $data)
         ->assertSessionHasErrors([
             'title',
             'cover_file_path'
             // don't need to see these can just leave the array blank the above is just the specific errors
         ]);
    // if there is a session error it won't even get to the next assert due to the validation class

    $this->assertDatabaseMissing($album, ['title' => $title]);
});
