<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|confirmed|min:6',
        ]);

        // Create new user
        $user = User::create([
            'name'     => $request->name,
            'username'    => $request->email,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('loginpage')->with('success', 'Account created successfully!');
    }

    public function loginprocess(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homepage')->with('success', 'Login successful! Welcome back.');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials, please try again.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginpage')->with('success', 'You have been logged out successfully.');
    }
}
