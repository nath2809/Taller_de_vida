<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Porfavor ingresa un email',
        ];
    }
}
