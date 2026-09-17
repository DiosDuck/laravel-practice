<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:20', 'min:2'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:500'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Fill the names ffs',
        ];
    }
}
