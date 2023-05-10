<?php

namespace App\Http\Controllers;

use App\Events\UserRegisterEvent;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProcessResetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function processLogin(LoginRequest $request): RedirectResponse
    {
        $remember = $request->has('remember');

        $arr = $request->validated();

        if(Auth::attempt($arr,$remember)) {
            $user = User::query()
                ->where('email',$request->get('email'))
                ->firstOrFail();
            Auth::login($user, $remember);

            return redirect()
                ->route('index')
                ->with('success', 'Login successful');
        }

        return redirect()
            ->back()
            ->with('error', 'Email or password incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Log out successfully!');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function processRegister(StoreUserRequest $request): RedirectResponse
    {
        try{
            $user = User::create([
                ...$request->validated(),
                'password' => Hash::make($request->input('password')),
            ]);

            Auth::login($user, true);

            UserRegisterEvent::dispatch($user);

            return redirect()->route('index')
                ->with('success', 'Create new user successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage());
        }
    }

    public function forgotPassword(): View
    {
        return view('auth.forgot-password');
    }

    public function processForgotPassword(ForgotPasswordRequest $request): RedirectResponse
    {
        $token = 'user_' . Str::random(15);

        $user = User::Where(['email' => $request->get('email')])->first();
        $user->update(['remember_token' => $token]);

        Mail::send('email.reset-password',compact('user'),function ($email) use ($user) {
            $email->subject(trans('Manage Events - Reset Password'));
            $email->to($user->email,$user->name);
        });

        return redirect()->route('login')
            ->with('success',trans('Please check your email to reset your password'));
    }

    public function resetPassword(ResetPasswordRequest $request): View | RedirectResponse
    {
        $token = $request->token;

        $user = User::Where(['remember_token' => $token])->first();
        if(!$user) {
            return redirect()->route('login')
                ->withErrors(trans('Unknown error please try again later'));
        }
        return view('auth.reset-password', ['token' => $token]);
    }

    public function processResetPassword(ProcessResetPasswordRequest $request)
    {
        $password = Hash::make($request->get('password'));
        User::where(['remember_token' => $request->get('token')])->update([
            'password' => $password,
            'remember_token' => null,
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('login')->with('success','Change Password Successfully !!!');
    }
}
