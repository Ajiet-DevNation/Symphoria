<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($this->user),
                'email',
            ],
            'password' => ['nullable'],
            'phone' => ['nullable', 'max:255', 'string'],
            'pass_type' => ['nullable', 'in:base,premium,mega,AJIET'],
            'usn' => ['nullable', 'max:255', 'string'],
            'uid' => ['nullable', 'max:255', 'string'],
            'transaction_id' => ['nullable', 'max:255', 'string'],
            'college_name' => ['nullable', 'max:255', 'string'],
            'payment_screenshot' => ['image', 'max:1024'],
            'id_card' => ['image', 'max:1024'],
            'is_paid' => ['nullable', 'boolean'],
            'roles' => 'array',
        ];
    }
}
