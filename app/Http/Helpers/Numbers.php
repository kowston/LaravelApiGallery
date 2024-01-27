<?php

namespace App\Http\Helpers;

class Numbers
{
    private int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

//    public function __construct(private int $number)
//    {
//
//    }

    public function addTen(): static
    {
        $this->number += 10;

        return $this;
    }

    public function multiplyTen(): static
    {
        $this->number *= 10;

        return $this;
    }

    public function minusTen(): static
    {
        $this->number -= 10;

        return $this;
    }

    public function get(): int
    {
        return $this->number;
    }
}
