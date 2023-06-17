<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScanQrCodeRequest;
use App\Http\Trait\ResponseTrait;
use App\Models\Event;
use App\Models\EventAttendance;
use App\Models\RegisterEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;

class AjaxScanQrCodeController extends Controller
{
    use ResponseTrait;

    public function attendant(ScanQrCodeRequest $request): JsonResponse
    {
        if (! $request->ajax()) {
            abort(403);
        }

        try {
            $eventId = $request->get('event_id');
            $qrcode = $request->get('qrcode');

            $registerEvent = RegisterEvent::query()
                ->where('code_student', $qrcode)
                ->where('event_id', $eventId)
                ->first();
            if ($registerEvent) {
                EventAttendance::create([
                    'event_id' => $eventId,
                    'register_event_id' => $registerEvent->id,
                ]);

                return $this->successResponse([], 'Successful Attendance');
            }

            return $this->errorResponse('Students who have not registered to participate');
        } catch (\Exception $e) {
            return $this->errorResponse(trans('This student has been enrolled'));
        }
    }

    public function getCode(Request $request): JsonResponse
    {
        if(auth()->user()->level < 2) {
            abort('403');
        }

        $event = Event::query()->whereId($request->get('event_id'))->first();

        $data = [
            'code' => substr(encrypt($event->code . Carbon::parse($event->happened_at)->format('Ymd')), 0, 9),
            'event' => $event->title
        ];

        return $this->successResponse($data, 'Get code successfully');
    }
}
