<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login () {
        return view('client.login');
    }

    function handleLogin (Request $request) {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login successfully');
        }
        return redirect()->back()->with('error', 'Email or password is incorrect');
    }

    function register () {
        return view('client.register');
    }

    function handleRegister (Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);
        return redirect()->route('home')->with('success', 'Register successfully');
    }

    function logout () {
        auth()->logout();
        return redirect()->route('home');
    }
}
