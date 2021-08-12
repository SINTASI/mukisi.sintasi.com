<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        // return Mail::to('masangga.com@gmail.com')->send(new UserRegister(User::find(1)));
        return view('users.login', [
            'title' => 'Login'
        ]);
    }


    public function userVerify(User $user, $hash)
    {
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }
        return redirect('/login')
            ->with('success', 'Akun berhasil terferivikasi...');
    }
}
