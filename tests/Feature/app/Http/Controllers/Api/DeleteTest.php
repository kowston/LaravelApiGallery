<?php

use App\Models\Album;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\deleteJson;


test ('can delete album', function () {
    authenticate();

    $album = Album::factory()->create();

    deleteJson(route('api.albums.destroy', $album));

    assertDatabaseCount(Album::class, 0);

});
