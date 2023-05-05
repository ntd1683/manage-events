<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function processLogin(LoginRequest $request)
    {
        $remember = $request->has('remember');

        $arr = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($arr,$remember)) {
            $user = User::query()
                ->where('email',$request->get('email'))
                ->firstOrFail();
            Auth::login($user, $remember);

            return redirect()->route('index')->with('success', 'Login successful');
        }

        return redirect()->back()->with('error', 'Email or password incorrect');
    }

    public function register(): View
    {
        return view('auth.register');
    }
    public function forgotPassword(): View
    {
        return view('auth.forgot-password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
