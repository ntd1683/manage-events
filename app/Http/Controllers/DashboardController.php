<?php

namespace App\Http\Controllers;

use App\Http\Query\EventFilterQuery;
use App\Http\Requests\Ajax\EventFilterRequest;
use App\Models\Event;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(EventFilterRequest $request, EventFilterQuery $eventFilterQuery): View
    {
        $events = $eventFilterQuery->apply(Event::query())->paginate($request->get('per_page'));
        return view('events.index', compact('events'));
    }
}
