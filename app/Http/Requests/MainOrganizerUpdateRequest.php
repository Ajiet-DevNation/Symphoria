<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainOrganizerUpdateRequest extends FormRequest
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
            'position' => ['nullable', 'max:255', 'string'],
            'phone' => ['nullable', 'max:255', 'string'],
            'email' => ['nullable', 'max:255', 'string'],
        ];
    }
}
