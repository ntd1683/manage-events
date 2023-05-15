<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UpdateEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        $validationData = parent::validationData();

        return auth()->user()->level === 4 || auth()->user()->id === $validationData['author'];
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string'],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'qr_code' => [
                'nullable',
                'image',
                File::types(['jpg', 'png', 'jpeg'])->max(1024 * 30),
            ],
        ];
    }
}
