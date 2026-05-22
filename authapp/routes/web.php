<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DemoController;
use App\Helpers\Calculator;
use App\Http\Controllers\TestController;
use App\Services\LoggerServices;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Uri;




Route::middleware('auth')->group(function () {

    Route::get(
        '/payment',
        [PaymentController::class, 'index']
    );

    Route::post(
        '/payment',
        [PaymentController::class, 'store']
    );
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('web')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->middleware(ValidateCsrfToken::class);
});

// Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
Route::get(
    '/dashboard',
    [AuthController::class, 'showDashboard']
)->name('dashboard')->middleware('auth');


Route::get('/dashboard-uri', function () {

    $uri = Uri::route('dashboard')
        ->withQuery([
            'page' => 2,
            'sort' => 'latest'
        ]);

    return (string) $uri;
});

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/demo', [DemoController::class, 'index']);



Route::get('/calc', function (Calculator $calc) {
    return $calc->add(5, 10);
});

Route::get('/test', [TestController::class, 'index']);


// Route::get('/test', [UserController::class, 'index']);


// Route::get('/payment', [UserController::class, 'index']);


// Route::post('/csrf-test', function () {
//     return "POST WORKED";
// });  

Route::get('/facade', function () {
    return app(LoggerServices::class)->log('Hello Laravel');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'showDashboard'])->middleware('auth');
});


// Route::get('/users/{id}',function($id){
//     return User ::findOrFail($id);   
// });

Route::get('/users/{id?}', function ($id = null) {
    if (!$id) {
        return "Id required";
    }
    return   User::findOrFail($id);
});

// Route::get('/contact',function(){
//         return view('contact');
// });

use Illuminate\Http\Request;

// Route::match(['get', 'post'], '/contact', function (Request $request) {

//     if ($request->isMethod('get')) { 
//         return view('contact');
//     }

//     return "Message received from: " . $request->name;
// });

Route::match(['get', 'post'], '/contact', function (Request $request) {
    if ($request->isMethod('get')) {
        return view('contact');
    }
    return "Message received from:" . $request->name;
});

Route::get('/unsubscribe/{user}', function (Request $request, $user) {
    if (! $request->hasValidSignature()) {
        abort(401);
    }
    return "User  {$user} unsubscribed successfully";
})->name('unsubscribe');


// use ILLUMINATE\Support\Facades\URL;
// Route::get('/generate-link',function(){
//     return URL::signedRoute('unsubscribe',[
//         'user'=>1
//     ]);
// });

Route::get('/temp-link', function () {

    return URL::temporarySignedRoute(
        'unsubscribe',
        now()->addMinutes(1),
        ['user' => 1]
    );
});

//session-set
Route::get('/session-set', function () {
    session(
        [
            'name' => 'John',
            'age' => '28',
            'city' => 'Ahmedabad'
        ]
    );

    return "Session set";
});

//session-get
Route::get('/session-get', function (Request $request) {

    $value = $request->session()->all();
    // $value = $request->session()->only(['name','age']);

    // $value = $request->session()->except(['name','age']);

    // dd(['s' => $value, 'csrf' => csrf_token()]);
    return $value;
});

//Default
Route::get('/session-default', function (Request $request) {

    $value = $request->session()->get('age', 18);

    return $value;
});

//session using closure
Route::get('/session-closure', function (Request $request) {

    $value = $request->session()->get('country', function () {
        return "India";
    });

    return $value;
});

Route::get('/session-helper-get', function () {

    return session('name');
});
Route::get('/session-only', function (Illuminate\Http\Request $request) {

    return $request->session()->only(['name', 'email']);
});

Route::get('/session-except', function (Illuminate\Http\Request $request) {

    return $request->session()->except(['_token']);
});

Route::get('/mydata', function (Request $request) {
    return $request->user();
})->middleware('auth');

// Route::get('/request-all', function (Request $request) {
//     return $request->all();
// });

Route::get('/request-all/{name}/{age}', function ($name, $age) {

    return [
        'name' => $name,
        'age' => $age
    ];
});

Route::get('session-pull', function (Request $request) {
    $name = $request->session()->pull('name');
    return $name;
});

use App\Http\Controllers\PostController;
// use App\Models\Post;
use App\Models\Post;

// Route::get('/posts/{post}', function (Post $post) {
//     return $post;
// });
Route::get('/posts', function () {
    return App\Models\Post::all();
});

Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}', function (App\Models\Post $post) {
    return $post;
});
