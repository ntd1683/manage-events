<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManageEventsRequest;
use App\Models\Event;
use App\Models\ManageEvent;
use App\Models\User;
use Illuminate\Http\Request;

class ManageEventController extends Controller
{
    public function index(Request $request)
    {
        $step = $request->get('step') ?: 1;
        $events = auth()->user()->manageEvents()->accepted()->published()->get();
        return view('events.manage', compact('step', 'events'));
    }

    public function store(StoreManageEventsRequest $request)
    {
        $eventId = $request->get('event_id');
        $code = $request->get('code');
        $userId = auth()->user()->id;

        $event = Event::query()->where('id', $eventId)->first();
        if($event->code !== $code) {
            abort('403');
        }

        $manageEvent = ManageEvent::query()
            ->where('event_id', $eventId)
            ->where('user_id', $userId)
            ->first();

        $manageEvent->status = 1;
        $manageEvent->save();

        return redirect()->route('events.index')->with('success', trans('More successful collaborators'));
    }
}
