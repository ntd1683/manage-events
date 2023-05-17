<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Trait\ResponseTrait;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AjaxEventController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $events = Event::query()->published();
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
                    $query->where('name', $keyword);
                }
            })
        ->make(true);
    }

    public function destroy(Event $event): JsonResponse
    {
        if(auth()->user()->level !== 4 && $event->author !== auth()->user()->id) {
            return $this->errorResponse('You do not have permission to delete this event !');
        }

        $event->delete();

        return $this->successResponse('', 'Delete Event Successfully');
    }
}
