<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Helpers\Hello;

class PagesController extends Controller
{
    public function test1(Hello $hello): view
    {
        $data = $hello->Award(7);

        return view('pages/test1', compact('data'));
    }

    public function test2(): view
    {
        return view('pages/test2');
    }

    public function test3(): view
    {
        return view('pages/test3');
    }

    public function test4(): view
    {
        return view('pages/test4');
    }
}
