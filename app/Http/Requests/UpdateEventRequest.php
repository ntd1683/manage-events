<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
            'published' => ['nullable', Rule::in(['1', '0'])],
            'happened_at' => ['required', 'date_format:d-m-Y'],
            'accepted' => ['nullable', Rule::in(['1', '0'])],
        ];
    }
}
