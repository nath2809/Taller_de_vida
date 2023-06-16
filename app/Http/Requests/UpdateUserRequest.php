<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    
     // Determine if the user is authorized to make this request.
     
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'name' => 'required',
            'surnames' => 'required',
            'type_document' =>'required',
            'document_number' => 'unique:users,document_number,'. $this->id,
            'email' => 'unique:users,email,' . $this->id,
            'phone_number' => 'unique:users,email,' . $this->id,
            'region' => 'required',
            'city' => 'required',
            'birthdate' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'email.unique' => 'Este email ya se encuentra *registrado*',
            'phone_number.unique' => 'Este numero de celular ya se encuentra *registrado*',
            'document_number.unique' => 'Numero de documento ya "registrado"',

        ];
    }
    
}
