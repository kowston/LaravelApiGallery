<?php

use App\Models\Album;

beforeEach(function () {
    authenticate();
});

test('can see albums', function() {

    Album::factory()->count(10)->create();
    $this
         ->get(route('albums.index'))
         ->assertOk()
         ->assertViewIs('admin.albums.index')
         ->assertViewHas('albums');
});


