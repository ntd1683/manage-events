<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanQrcodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $step = $request->get('step') === 2 ?: 1;

        $events = auth()->user()
            ->ManageEvents()
            ->accepted()
            ->published()
            ->where('happened_at', '=', today('Asia/Jakarta'))
            ->get();

        $eventId = $request->get('event_id') ?: -1;

        return view('events.scan-qr', compact('events', 'eventId', 'step'));
    }
}
