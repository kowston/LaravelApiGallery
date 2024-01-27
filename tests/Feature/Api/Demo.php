<?php

use function Pest\Laravel\getJson;

test('cannot see albums when not authenticated', function()
{
   getJson('api/albums')->assertUnauthorized();
});
