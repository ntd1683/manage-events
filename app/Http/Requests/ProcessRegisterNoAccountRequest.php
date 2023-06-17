<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcessRegisterNoAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'event_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'code_student' => ['required', 'string'],
            'class' => ['required', 'string'],
            'faculty' => ['required', 'string'],
            'phone' => ['nullable', 'string'],
            'email' => ['required', 'email'],
            'type' => ['required', Rule::in([0,1,2])],
        ];
    }
}
