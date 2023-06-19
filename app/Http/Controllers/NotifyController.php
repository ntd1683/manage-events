<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotifyRequest;
use App\Models\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class NotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notify.index');
    }

    public function analytics()
    {
        return view('notify.analytics');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notify = new Notify();
        return view('notify.create', compact('notify'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotifyRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Notify::create([
            ...$data,
            'author' => auth()->user()->id,
        ]);

        return redirect()->route('notify.analytics')->with('success', trans('Add Notify Successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notify $notify)
    {
        if (auth()->user()->level !== 4 && $notify->author !== auth()->user()->id) {
            abort(403);
        }

        return view('notify.edit', compact('notify'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNotifyRequest $request, Notify $notify)
    {
        $data = $request->validated();

        $notify->update($data);

        return redirect()->route('notify.analytics')->with('success', trans('Edit Notify Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notify $notify)
    {
        if (auth()->user()->level !== 4 && $notify->author !== auth()->user()->id) {
            abort(403);
        }

        $notify->delete();

        return redirect()->route('notify.analytics')->with('success', trans('Delete Notify Successfully'));
    }
}
