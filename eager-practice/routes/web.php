<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',function(){
return view('auth.register');
});
Route::post('/register', function (Request $request) {

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    return back()->with('success', 'User created successfully!');
});


Route::get('/register1',function(){
return view('auth.register1');
});


// Route::post('/register',[C::class,'logout']);

// Route::get('/demo',[DemoController::class,'index']);