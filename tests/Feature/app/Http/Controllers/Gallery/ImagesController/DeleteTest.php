<?php

use App\Models\Album;

test ('can delete record', function () {
    authenticate();

    $album = Image::factory()->create();

    $this->delete(route('albums.destroy', $album))
         ->assertRedirect(route('albums.index'));

    $this->assertDatabaseCount($album, 0);
});
