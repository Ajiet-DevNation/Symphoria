<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'img' => ['image', 'max:1024'],
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'string'],
            'event_type_id' => ['required', 'exists:event_types,id'],
            'date' => ['required', 'date'],
            'branch' => ['nullable', 'max:255', 'string'],
            'is_registration' => ['required', 'boolean'],
            'location' => ['nullable', 'max:255', 'string'],
        ];
    }
}
