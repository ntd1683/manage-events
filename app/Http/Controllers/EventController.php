<?php

namespace App\Http\Controllers;

use App\Http\Query\EventFilterQuery;
use App\Http\Requests\Ajax\EventFilterRequest;
use App\Http\Requests\ProcessRegisterNoAccountRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\EventAttendance;
use App\Models\ManageEvent;
use App\Models\Media;
use App\Models\RegisterEvent;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(EventFilterRequest $request, EventFilterQuery $eventFilterQuery): View
    {
        $events = $eventFilterQuery->apply(Event::query())->paginate($request->get('per_page'));
        return view('events.index', compact('events'));
    }

    public function analytics(): View
    {
        return view('events.analytics');
    }

    public function registerNoAccount(Request $request, Event $event): View
    {
        $code = substr(encrypt($event->code . Carbon::parse($event->happened_at)->format('Ymd')), 0, 9);
        if($event->published != 1
            || $event->accepted != 1
            || $event->happened_at === today('Asia/Jakarta')
            || $request->get('code') !== $code
        ) {
            abort(403);
        }

        $eventId = $event->id;
        if(auth()->guest()) {
            $user = new User();
        } else {
            $user = auth()->user();
        }

        return view('events.register-no-account', compact('user', 'eventId'));
    }

    public function processRegisterNoAccount(ProcessRegisterNoAccountRequest $request)
    {
        $data = $request->validated();
        $registerEvent = RegisterEvent::create([
            ...$data,
        ]);

        EventAttendance::create([
            'event_id' => $request->get('event_id'),
            'register_event_id' => $registerEvent->id,
        ]);

        return redirect()->route('index')->with('success', 'Successful attendance');
    }

    public function create(): View
    {
        $event = new Event();
        $media = '';
        $emails = '';
        return view('events.create', compact('event', 'media', 'emails'));
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        $arrEmail = json_decode($request->get('emails'));
        $emails = [];

        foreach ($arrEmail as $email) {
            $emails[] = get_object_vars($email)['value'];
        }

        $happenedAt = Carbon::createFromFormat('d-m-Y', $request->get('happened_at'))->format('Y-m-d');
        ;
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
            'happened_at' => $happenedAt,
        ]);

        if ($request->get('published')) {
            $event->publish();
        } else {
            $event->published = 0;
            $event->save();
        }

        if ($request->get('accepted') && auth()->user()->level === 4) {
            $event->accept();
        } else {
            $event->save();
        }

        ManageEvent::create([
            'event_id' => $event->id,
            'user_id' => auth()->user()->id,
            'status' => 1,
        ]);

        foreach ($emails as $email) {
            try {
                $id = User::query()->where('email', $email)->first()->id;

                ManageEvent::create([
                    'event_id' => $event->id,
                    'user_id' => $id,
                    'status' => 0,
                ]);
            } catch (\Exception $e) {
            }
        }

        return redirect()->route('events.index')->with('success', trans('Add Event Successfully'));
    }

    public function show(Event $event): View|RedirectResponse
    {

        $media = '';

        if ($event->media_id) {
            $media = Media::query()->where('id', $event->media_id)->first();
            $media = $media->url;
        }

        $event->happened_at = Carbon::parse($event->happened_at)->format('d-m-Y');

        return view('events.show', compact('event', 'media'));
    }

    public function edit(Event $event): View|RedirectResponse
    {
        if (auth()->user()->level !== 4 && $event->author !== auth()->user()->id) {
            return redirect()->route('events.index')->withErrors('You do not have permission to edit this event !');
        }

        $media = '';

        if ($event->media_id) {
            $media = Media::query()->where('id', $event->media_id)->first();
            $media = $media->url;
        }

        $emails = $event->ManageUsers()->pluck('email')->toJson();

        return view('events.edit', compact('event', 'media', 'emails'));
    }

    public function update(Event $event, UpdateEventRequest $request): RedirectResponse
    {
        $arrEmail = json_decode($request->get('emails'));
        $emails = [];

        foreach ($arrEmail as $email) {
            $emails[] = get_object_vars($email)['value'];
        }

        $data = $request->validated();
        if ($request->hasFile('qr_code')) {
            if ($event->media_id) {
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

        $data['happened_at'] = Carbon::createFromFormat('d-m-Y', $request->get('happened_at'))->format('Y-m-d');

        $event->update($data);

        if ($request->get('published')) {
            $event->publish();
        } else {
            $event->published = 0;
            $event->save();
        }

        if ($request->get('accepted') === 1 && auth()->user()->level === 4) {
            $event->accept();
        } elseif ($request->get('accepted') === 0 && auth()->user()->level === 4) {
            $event->accepted = 0;
            $event->save();
        }

        foreach ($emails as $email) {
            try {
                $id = User::query()->where('email', $email)->first()->id;

                ManageEvent::create([
                    'event_id' => $event->id,
                    'user_id' => $id,
                    'status' => 0,
                ]);
            } catch (\Exception $e) {
            }
        }

        return redirect()->route('events.index')->with('success', 'Update Event Successfully');
    }

    public function destroy(Event $event): RedirectResponse
    {
        if (auth()->user()->level !== 4 && $event->author !== auth()->user()->id) {
            abort(403);
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Delete Event Successfully');
    }
}
