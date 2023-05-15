<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string'],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'qr_code' => ['nullable'],
        ];
    }
}
