<?php

use App\Models\Album;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\delete;

test ('can delete record', function () {
    authenticate();

    $album = Album::factory()->create();

    delete(route('albums.destroy', $album))
         ->assertRedirect(route('albums.index'));

    assertDatabaseCount(Album::class, 0);
});
