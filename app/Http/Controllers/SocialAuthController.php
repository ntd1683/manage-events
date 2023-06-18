<?php

namespace App\Http\Controllers;

use App\Services\SocialAccountService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        if($user) {
            auth()->login($user);
            return redirect()->route('index')->with('success', trans('Login Successfully'));
        }

        return redirect()->route('login')->with('error', trans('Error Unknown'));
    }
}
