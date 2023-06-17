<?php

namespace App\Http\Requests;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ScanQrCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level >= 2 ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'event_id' => ['required'],
            'qrcode' => ['required'],
        ];
    }
}
