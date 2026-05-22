<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
abstract class Controller
{
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    return back()->with('success', 'User created successfully!');
}}
