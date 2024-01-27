<?php

use App\Models\Image;
use Illuminate\Http\UploadedFile;

beforeEach(function () {
    authenticate();
});

test('can see edit page', function () {

    $image = Image::factory()->create();

    $this
        ->get(route('images.edit', $image))
        ->assertOk()
        ->assertViewIs('admin.images.edit')
        ->assertViewHas('image', $image);
});

test ('can update a record', function () {
    $image = Image::factory()->create();

    $title = $this->faker->title;

    $data = [
        'title' => $title,
        'description' => $this->faker->sentence,
        'image_file_path' => UploadedFile::fake()->image('logo.png')
    ];

    $this->patch(route('images.update', $image), $data)
         ->assertSessionHasNoErrors()
         ->assertRedirect(route('images.index'));

    $this->assertDatabaseHas($image, ['title' => $title]);
});

test ('cannot update with invalid data', function () {
    $image = Image::factory()->create();

    $title = 'title of image';

    $data = [];

    $this->patch(route('images.update', $image), $data)
         ->assertSessionHasErrors([
             'title',
             'image_file_path'
             // don't need to see these can just leave the array blank the above is just the specific errors
         ]);
    // if there is a session error it won't even get to the next assert due to the validation class

    $this->assertDatabaseMissing($image, ['title' => $title]);
});
