<?php

namespace App\Http\Controllers;

use App\Services\SocialAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        if ($user) {
            auth()->login($user);

            Mail::send('email.create-user', compact('user'), function ($email) use ($user) {
                $email->subject(trans('Manage Events - invitation to join'));
                $email->to($user->email, $user->name);
            });

            return redirect()->route('index')->with('success', trans('Login Successfully'));
        }

        return redirect()->route('login')->with('error', trans('Error Unknown'));
    }
}
