<?php

use App\Models\Tag;

test ('can delete tag record', function () {
    authenticate();

    $tag = Tag::factory()->create();

    $this->delete(route('tags.destroy', $tag))
         ->assertRedirect(route('tags.index'));

    $this->assertDatabaseCount($tag, 0);
});
