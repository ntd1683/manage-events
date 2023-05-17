<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Trait\ResponseTrait;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AjaxEventController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        return DataTables::of(Event::query())
            ->editColumn('title', function ($object) {
                return Str::limit($object->title, 28);
            })
            ->editColumn('subtitle', function ($object) {
                return Str::limit($object->subtitle, 20);
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
