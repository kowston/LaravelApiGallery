<?php

use App\Models\Album;
use function Pest\Laravel\getJson;

beforeEach(function () {
    authenticate();
});

test ('can see albums', function () {

    Album::factory()->count(10)->create();

    getJson(route('api.albums.index'))
        ->assertOk()
        ->assertJsonCount(10, 'data');
});
