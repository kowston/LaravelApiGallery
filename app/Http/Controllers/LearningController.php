<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Message;
use App\Http\Helpers\Numbers;
use Illuminate\Contracts\View\View;

class LearningController extends Controller
{
//    public function index(): View
//    {
//        return view('learning/nameform');
//    }
//
//    public function store(Message $message): view
//    {
//        $name = request('name');
//        //$message = new Message();
//        $name = $message->nameCatch($name);
//
//        return view('learning/message', compact('name'));
//    }

    public function indexNumbers(): view
    {
        return view('learning.numbers.form');

    }

//    public function storeNumbers(Numbers $numbers): view
//    {
//        $data = request('number');
//        $data = $numbers->addTen($data);
//        $data = $numbers->multiplyTen($data);
//        return view('learning.numbers.result', compact('data'));
//    }

    public function storeNumbers(): view
    {
        $number = new Numbers(request('number'));
        $data = $number
            ->multiplyTen()
            ->addTen()
            ->minusTen()
            ->get();
        //$data = $numbers->multiplyTen($data);

        return view('learning.numbers.result', compact('data'));
    }


}

