<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Trait\ResponseTrait;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AjaxUserController extends Controller
{
    use ResponseTrait;

    public function checkEmailUser(Request $request): JsonResponse
    {
        if (! $request->ajax()) {
            abort(403);
        }

        if(auth()->user()->email === $request->get('email')) {
            return $this->ErrorResponse('Can\'t check email myself');
        }

        try {
            $user = User::query()->where('email', $request->get('email'))->first();
            if($user) {
                return $this->successResponse([], 'True');
            }
            return $this->ErrorResponse('Fail');
        } catch (\Exception $e) {
            return $this->ErrorResponse('Fail');
        }
    }
}
