<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show_login()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $request->session()->regenerate();

            // role check
            if ($user->role === "admin") {
                return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully');
            } else if ($user->role ===  "staff") {
                return redirect()->route('staff.dashboard')->with('success', 'Logged in successfully');
            }

            Auth::logout();
            return back()->with('error', 'Forbidden');
        }

        return back()->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login')->with('success', 'Logged out successfully');
    }
}