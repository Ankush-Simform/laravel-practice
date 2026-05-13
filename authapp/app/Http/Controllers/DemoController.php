<?php

namespace App\Http\Controllers;

use App\Services\GreetingService;

class DemoController extends Controller
{
    public function index(GreetingService $greeting)
    {
        $message = $greeting->sayHello("Rahul");

        return $message;
    }
}