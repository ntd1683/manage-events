<?php

namespace App\Http\Requests;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ImportGoogleSheet extends FormRequest
{
    public function authorize(): bool
    {
        $validationData = parent::validationData();
        $event = Event::query()->where('id', $validationData['event_id'])->first();

        return auth()->user()->id === $event->author;
    }

    public function rules(): array
    {
        return [
            'event_id' => ['required'],
            'sheet' => ['required', 'string'],
            'sheet_tab_name' => ['required', 'string'],
        ];
    }
}
