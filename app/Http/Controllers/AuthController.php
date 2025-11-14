<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'nim' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $userId = Auth::id();
            User::where('id', $userId)->update(['last_activity' => now()]);

            return redirect()->route('dashboard.index');
        }

        return back()->withErrors([
            'nim' => 'The provided credentials do not match our records.',
        ])->onlyInput('nim');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar');
    }
}
