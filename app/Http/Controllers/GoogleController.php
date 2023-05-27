<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GoogleController extends Controller
{
    public function __invoke(request $request): View
    {
        $events = Event::query()->where('author', auth()->user()->id)->get();
        $eventId = $request->get('event_id') ?: -1;

        return view('events.google.import', compact('events', 'eventId'));
    }
}
