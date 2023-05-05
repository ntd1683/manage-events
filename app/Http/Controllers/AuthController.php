<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
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
        return redirect()->route('admin.login');
    }
}
