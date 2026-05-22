<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Services\SimpleLogger;


// class TestController extends Controller
// {
//     public function __construct(public SimpleLogger $simpleLogger)
//     {
//     }
//     public function index()  {
//      $message=   $this->simpleLogger->Log('user accessed this test page  ');
//      dump($message);
//     }
// }


namespace App\Http\Controllers;

use App\Facades\SimpleLoggerFacade as Logger;
use  App\Services\LoggerServices;
class TestController extends Controller
{
    public function index()
    {
        // $message = Logger::log('user accessed this test page');

        // dump($message);
        $a = app(LoggerServices::class);
        $b = app(LoggerServices::class);
        $d = app(LoggerServices::class);
        $e = app(LoggerServices::class);
        dump(spl_object_id($a), spl_object_id($b), spl_object_id($d));
    }
}