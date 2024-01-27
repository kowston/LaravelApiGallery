<?php

use App\Models\Album;
use App\Models\Image;

beforeEach(function () {
    authenticate();
});

test('Can see images', function() {

    Image::factory()->count(10)->create();
    $this
        ->get(route('images.index'))
        ->assertOk()
        ->assertViewIs('admin.images.index')
        ->assertViewHas('images');
});
