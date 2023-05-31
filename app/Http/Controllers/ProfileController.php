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

    public function store(StoreProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
            ...$request->validated()
        ]);

        return redirect()->route('index')->with('success', trans('Change Information Successfully'));
    }
}
