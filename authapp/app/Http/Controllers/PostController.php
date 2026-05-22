<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(Request $request) {
        Post::create([
        'title'=>$request->title,
        'slug'=>Str::slug($request->title),
        'content'=>$request->content
        ]);
        return redirect('/posts')
        ->with('success','Post Created successfully');
    }    
}
