<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6 '
        ]);

        $validated['name'] = preg_replace(
            '/\s+/',
            '',
            trim($validated['name'])
        );

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect('/login');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }
        return back()->with('error', 'invalid credentials')
            ->withInput();
    }

    public function showDashboard()
    {
        return view('dashboard');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
