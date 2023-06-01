<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Query\EventFilterQuery;
use App\Http\Requests\Ajax\AjaxStoreEventRequest;
use App\Http\Requests\Ajax\EventFilterRequest;
use App\Http\Trait\ResponseTrait;
use App\Models\Event;
use App\Models\RegisterEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class AjaxEventController extends Controller
{
    use ResponseTrait;

    public function index(EventFilterRequest $request, EventFilterQuery $eventFilterQuery): View
    {
        $events = $eventFilterQuery->apply(Event::query())->paginate($request->get('per_page'));
        return view('events.partials.list', compact('events'));
    }

    public function analytics(Request $request)
    {
        $selectUser = $request->select_user ?: 0;
        $selectAccept = $request->select_accept ?: -1;
        $selectPublish = $request->select_publish ?: -1;
        $events = Event::query()
            ->when($selectUser === 0 || auth()->user()->level !== 4, function ($query) use ($selectUser) {
                $query->where('author', auth()->user()->id);
            })
            ->when(in_array($selectAccept, [1,2]), function ($query) use ($selectAccept) {
                $selectAccept = $selectAccept == 1 ? 0 : 1;
                $query->where('accepted', $selectAccept);
            })
            ->when(in_array($selectPublish, [1,2]), function ($query) use ($selectPublish) {
                $selectPublish = $selectPublish == 1 ? 0 : 1;
                $query->where('published', $selectPublish);
            });
        return DataTables::of($events)
            ->editColumn('title', function ($object) {
                return [
                    'title' => $object->title,
                    'value' =>  Str::limit($object->title, 28),
                ];
            })
            ->editColumn('subtitle', function ($object) {
                return [
                    'title' => $object->subtitle,
                    'value' =>  Str::limit($object->subtitle, 20),
                ];
            })
            ->editColumn('happened_at', function ($object) {
                return Carbon::parse($object->happened_at)->format('d-m-Y');
            })
            ->addColumn('destroy', function ($object) {
                return route('ajax.events.destroy', $object);
            })
            ->addColumn('edit', function ($object) {
                return route('events.edit', $object);
            })
            ->filterColumn('title', function ($query, $keyword) {
                if ($keyword !== 'null') {
                    $query->where('title', $keyword);
                }
            })
            ->filterColumn('author', function ($query, $keyword) {
                if ($keyword !== 'null') {
                    $query->where('title', $keyword);
                }
            })
        ->make(true);
    }

    public function store(AjaxStoreEventRequest $request): JsonResponse
    {
        try {
            $user = auth()->user();

            $registerEvent = RegisterEvent::query()
                ->where('code_student', $user->code_student)
                ->where('event_id', $request->get('event_id'))
                ->first();

            if ($registerEvent) {
                return $this->errorResponse(trans('You have already registered for the event'));
            }

            RegisterEvent::create([
                'name' => $user->name,
                'code_student' => $user->code_student,
                'class' => $user->class,
                'faculty' => $user->faculty,
                'phone' => $user->phone,
                'email' => $user->email,
                'event_id' => $request->get('event_id'),
            ]);

            return $this->successResponse([], trans('Registered Successfully'));
        } catch (\Exception $e) {
            return $this->errorResponse(trans('Unknown error, please try again later'));
        }
    }

    public function destroy(Event $event): JsonResponse
    {
        if (auth()->user()->level !== 4 && $event->author !== auth()->user()->id) {
            return $this->errorResponse('You do not have permission to delete this event !');
        }

        $event->delete();

        return $this->successResponse('', 'Delete Event Successfully');
    }
}
