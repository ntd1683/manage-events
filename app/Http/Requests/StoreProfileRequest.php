<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'code_student' => ['nullable', 'string'],
            'class' => ['nullable', 'string'],
            'faculty' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'gender' => ['required', Rule::in([1,2,0])],
        ];
    }
}
