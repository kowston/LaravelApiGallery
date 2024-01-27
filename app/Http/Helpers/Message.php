<?php

namespace App\Http\Helpers;

class Message
{
    public function nameCatch($name): string
    {
       return strtoupper($name);
    }
}
