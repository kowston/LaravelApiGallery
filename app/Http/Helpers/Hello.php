<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Http;

class Hello
{
    public function Award($point): int
    {
        $six = 6;

        $number = $point + $six;

        return $number;
    }

    public function Dog(): string
    {
        $response = Http::withHeaders()

        return ;
    }
}
