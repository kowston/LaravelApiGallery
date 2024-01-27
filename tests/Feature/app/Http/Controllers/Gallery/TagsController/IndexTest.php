<?php

use App\Models\Album;

beforeEach(function () {
    authenticate();
});

test('Can see tags', function() {

    Album::factory()->count(10)->create();
    $this
        ->get(route('tags.index'))
        ->assertOk()
        ->assertViewIs('admin.tags.index')
        ->assertViewHas('tags');
});
