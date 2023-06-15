<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('setting.profile');
    }

    public function update(StoreProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
            ...$request->validated()
        ]);

        try {
            $email = $user->email;

            if ($request->get('email') && $email !== $request->get('email')) {
                $user->email = $request->get('email');
                $user->email_verified_at = null;
                $user->save();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(trans('Email Exists'));
        }

        return redirect()->route('index')->with('success', trans('Change Information Successfully'));
    }
}
