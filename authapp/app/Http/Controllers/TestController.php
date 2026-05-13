<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SimpleLogger;


class TestController extends Controller
{
    public function __construct(public SimpleLogger $simpleLogger)
    {
    }
    public function index()  {
     $message=   $this->simpleLogger->Log('user accessed this test page  ');
     dump($message);
    }
}
