<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'phone_number' => 'unique:users,phone_number,'. $this->id,
            'region' => 'required',
            'city' => 'required',
            'birthdate' => 'required',
            'image_profile'=> 'mimes:jpeg,jpg,png|max:10240'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Este email ya se encuentra *registrado*', 
            'phone_number.unique' => 'Este numero de telefono ya se encuentra *registrado*', 
            'document_number.unique' => 'Numero de documento ya "registrado"',
            'image_profile.mimes' => 'La extencion del archivo no es soportada',
        ];
    }
}
