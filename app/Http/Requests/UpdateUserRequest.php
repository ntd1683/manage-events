<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level == 4;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'gender' => ['required', Rule::in([0,1,2])],
            'code_student' => ['nullable', 'string'],
            'class' => ['nullable', 'string'],
            'faculty' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'level' => ['required', Rule::in([0,1,2,3,4])],
        ];
    }
}
