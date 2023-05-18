<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventController extends Controller
{
    public function analytics(): View
    {
        return view('events.analytics');
    }
    public function create(): View
    {
        return view('events.create');
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        $happenedAt = Carbon::parse($request->get('happenedAt'));
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

        $event = Event::create([
            ...$request->validated(),
            'author' => auth()->user()->id,
            'media_id' => $media_id,
            'happenedAt' => $happenedAt,
        ]);

        if($request->get('published')) {
            $event->publish();
        } else {
            $event->published = 0;
            $event->save();
        }

        if($request->get('accepted') && auth()->user()->level === 4) {
            $event->accept();
        } else {
            $event->accepted = 0;
            $event->save();
        }

        return redirect()->route('events.index')->with('success', 'Thêm sự kiện thành công.');
    }

    public function edit(Event $event): View | RedirectResponse
    {
        if(auth()->user()->level !== 4 && $event->author !== auth()->user()->id) {
            return redirect()->route('events.index')->withErrors('You do not have permission to edit this event !');
        }

        $media = '';

        if($event->media_id){
            $media = Media::query()->where('id', $event->media_id)->first();
            $media = $media->url;
        }

        return view('events.edit', compact('event', 'media'));
    }

    public function update(Event $event, UpdateEventRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('qr_code')) {
            if($event->media_id){
                $media = Media::query()->where('id', $event->media_id)->first();
                Storage::disk('public')->delete($media->url);
            }
            $qr = $request->file('qr_code');
            $name = 'qr' . Str::random(5) . '.' . $qr->extension();
            $path = $qr->storeAs('images', $name, 'public');

            $media = Media::create([
                'name' => $name,
                'type' => $qr->extension(),
                'url' => $path,
            ]);

            $data['media_id'] = $media->id;
        }

        $data['author'] = $request->get('author');

        $event->update($data);

        if($request->get('published')) {
            $event->publish();
        } else {
            $event->published = 0;
            $event->save();
        }

        if($request->get('accepted') === 1 && auth()->user()->level === 4) {
            $event->accept();
        } else if($request->get('accepted') === 0 && auth()->user()->level === 4){
            $event->accepted = 0;
            $event->save();
        }

        return redirect()->route('events.index')->with('success', 'Update Event Successfully');
    }

    public function destroy(Event $event): RedirectResponse
    {
        if(auth()->user()->level !== 4 && $event->author !== auth()->user()->id) {
            return redirect()->route('events.index')->withErrors('You do not have permission to delete this event !');
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Delete Event Successfully');
    }
}
