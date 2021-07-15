<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return inertia('index', [
            'title' => 'LOGIN'
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username', $request->username);
        if ($user->exists()) {
            if (Auth::attempt([
                'username' => $request->username,
                'password' => $request->password
            ], $request->remember)) {
                $request->session()->regenerate();
                return redirect('admin/dashboard');
            }
            return inertia('index')->with('message', 'Password tidak sesuai');
        }
        return inertia('index')->with('message', 'Username tidak ditemukan');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }
}
