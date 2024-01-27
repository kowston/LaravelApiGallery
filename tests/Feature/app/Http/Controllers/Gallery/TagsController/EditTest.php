<?php

use App\Models\Tag;
use Illuminate\Http\UploadedFile;

beforeEach(function () {
    authenticate();
});

test('can see edit page', function () {

    $tag = Tag::factory()->create();

    $this
        ->get(route('tags.edit', $tag))
        ->assertOk()
        ->assertViewIs('admin.tags.edit')
        ->assertViewHas('tag', $tag);
});

test ('can update a tag record', function () {
    $tag = Tag::factory()->create();

    $title = $this->faker->sentence;

    $data = [
        'title' => $title,
        'description' => $this->faker->sentence];

    $this->patch(route('tags.update', $tag), $data)
         ->assertSessionHasNoErrors()
         ->assertRedirect(route('tags.index'));

    $this->assertDatabaseHas($tag, ['title' => $title]);
});

test ('cannot update with invalid data', function () {
    $tag = Tag::factory()->create();

    $title = 'title of tag';

    $data = [];

    $this->patch(route('tags.update', $tag), $data)
         ->assertSessionHasErrors([
             'title'
             // don't need to see these can just leave the array blank the above is just the specific errors
         ]);
    // if there is a session error it won't even get to the next assert due to the validation class

    $this->assertDatabaseMissing($tag, ['title' => $title]);
});
