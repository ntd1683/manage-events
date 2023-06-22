<?php

namespace App\Http\Controllers;

use App\Enums\UserLevelEnum;
use App\Events\UserRegisterEvent;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = UserLevelEnum::getArrayView();
        return view('users.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = UserLevelEnum::getArrayView();
        $user = new User();
        return view('users.create', compact('levels', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $password = Hash::make('12345678');
        $user = User::create([
            ...$data,
            'password' => $password,
        ]);

        Mail::send('email.create-user', compact('user'), function ($email) use ($user) {
            $email->subject(trans('Manage Events - invitation to join'));
            $email->to($user->email, $user->name);
        });

        return redirect()->route('users.index')->with('success', trans('Add User Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $levels = UserLevelEnum::getArrayView();
        return view('users.edit', compact('levels', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('users.index')->with('success', trans('Edit User Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->user()->level !== 4) {
            abort(403);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', trans('Delete User Successfully'));
    }
}
