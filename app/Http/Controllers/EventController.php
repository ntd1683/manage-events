<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestEvent;
use App\Models\Event;
use App\Models\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventController extends Controller
{
    public function create(): View
    {
        return view('events.create');
    }

    public function store(StoreRequestEvent $request): RedirectResponse
    {
        $media_id = null;
        if ($request->hasFile('qr_code')) {
            $qr = $request->file('qr_code');
            $name = 'qr_' . Str::random(5) . '.' . $qr->extension();
            $path = $qr->storeAs('images', $name, 'public');

            $media = Media::create([
                'name' => $name,
                'type' => $qr->extension(),
                'url' => $path,
            ]);

            $media_id = $media->id;
        }

        Event::create([
            ...$request->validated(),
            'author' => auth()->user()->id,
            'media_id' => $media_id,
        ]);

        return redirect()->route('events.index')->with('success', 'Thêm sự kiện thành công.');
    }

    public function edit(Event $event)
    {
    }
}
