<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'max:3000'],
            'first_name' => ['required', 'max:20', 'string'],
            'last_name' => ['required', 'max:20', 'string'],
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required', 'string', 'max:20'],
            'bank_account_number' => ['required', 'numeric', 'max_digits:50'],
            'about' => ['nullable', 'string', 'max:500'],
        ];
    }
}
