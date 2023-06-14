<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Trait\ResponseTrait;
use App\Models\Notify;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AjaxNotifyController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        return DataTables::of(auth()->user()->notify())
            ->editColumn('content', function ($object) {
                return[
                    'value' => Str::limit($object->content, 28),
                    'title' => $object->content,
                ];
            })
            ->editColumn('created_at', function ($object) {
                return $object->created_at->diffForHumans();
            })
            ->editColumn('author', function ($object) {
                return User::query()->whereId($object->author)->first()->name;
            })
            ->make(true);
    }

    public function analytics()
    {
        return DataTables::of(Notify::query())
            ->editColumn('content', function ($object) {
                return[
                    'value' => Str::limit($object->content, 28),
                    'title' => $object->content,
                ];
            })
            ->editColumn('created_at', function ($object) {
                return $object->created_at->diffForHumans();
            })
            ->editColumn('author', function ($object) {
                return User::query()->whereId($object->author)->first()->name;
            })
            ->editColumn('edit', function ($object) {
                return route('notify.edit', $object);
            })
            ->editColumn('destroy', function ($object) {
                return route('ajax.notify.destroy', $object);
            })
            ->make(true);
    }

    public function destroy(Notify $notify): JsonResponse
    {
        $notify->delete();
        return $this->successResponse('', 'Delete Event Successfully');
    }
}
