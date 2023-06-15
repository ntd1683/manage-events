<?php

namespace App\Http\Controllers\Ajax;

use App\Enums\UserGenderEnum;
use App\Enums\UserLevelEnum;
use App\Http\Controllers\Controller;
use App\Http\Trait\ResponseTrait;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AjaxUserController extends Controller
{
    use ResponseTrait;

    public function analytics(Request $request)
    {
        if ($request->get('level') != 0) {
            $level = $request->get('level') ?: -1;
        } else {
            $level = 0;
        }
        $users = User::query()
            ->when($level != -1, function ($query) use ($level) {
                $query->where('level', $level);
            });
        return DataTables::of($users)
            ->editColumn('level', function ($object) {
                return UserLevelEnum::getKeyByValue($object->level);
            })
            ->editColumn('gender', function ($object) {
                return UserGenderEnum::getKeyByValue($object->gender);
            })
            ->editColumn('created_at', function ($object) {
                return $object->created_at ? $object->created_at->diffForHumans() : '';
            })
            ->addColumn('destroy', function ($object) {
                return route('ajax.users.destroy', $object);
            })
            ->addColumn('edit', function ($object) {
                return route('users.edit', $object);
            })
            ->make(true);
    }

    public function checkEmailUser(Request $request): JsonResponse
    {
        if (! $request->ajax()) {
            abort(403);
        }

        if (auth()->user()->email === $request->get('email')) {
            return $this->ErrorResponse('Can\'t check email myself');
        }

        try {
            $user = User::query()->where('email', $request->get('email'))->first();
            if ($user) {
                return $this->successResponse([], 'True');
            }
            return $this->ErrorResponse('Fail');
        } catch (\Exception $e) {
            return $this->ErrorResponse('Fail');
        }
    }

    public function destroy(User $user): JsonResponse
    {
        if (auth()->user()->id === $user->id) {
            return $this->errorResponse('Can\'t delete myself !');
        }
        if (auth()->user()->level !== 4) {
            return $this->errorResponse('You do not have permission to delete this event !');
        }

        $user->delete();

        return $this->successResponse('', 'Delete Event Successfully');
    }
}
