<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            \Log::info('Login berhasil untuk user: ' . Auth::user()->username);
            $request->session()->regenerate();
            $user = Auth::user();
        
            if ($user->role === 'admin') {
                \Log::info('Pengguna admin, mengarahkan ke homepage');
                return redirect()->route('homepage');
            } else {
                \Log::info('Pengguna biasa, mengarahkan ke main');
                return redirect()->route('main');
            }
        } else {
            \Log::info('Login gagal untuk username: ' . $request->username);
        }
        

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}