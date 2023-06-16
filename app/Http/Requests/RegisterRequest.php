<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    
     // Determine if the user is authorized to make this request.
     
    public function authorize(): bool
    {
        return true;
    }

     //Reglas para poder insertar los datos del USUARIO en la base de datos

    public function rules(): array
    {
        return [
            
            'name' => 'required',
            'surnames' => 'required',
            'type_document' =>'required|',
            'document_number' => ['required', 'numeric', 'digits_between:8,10', 'unique:users,document_number'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone_number' => ['required', 'numeric', 'digits:10', 'unique:users,phone_number'],
            'region' => 'required',
            'city' => 'required',
            'birthdate' => ['required', 'date', 'before_or_equal:' . now()->subYears(16)->format('Y-m-d')],
            'password' => 'required|confirmed|min:8',
            'image_profile' => 'required |mimes:jpeg,jpg,png,webp|max:10240',

        ];
    }

     //Mensajes de ERROR en caso de que no se cumpla alguna regla

    public function messages()
    {

        return [

            'document_number.unique' => 'Número de documento ya registrado.',
            'document_number.digits_between' => 'Ingresa un número de documento válido.',
            'document_number.numeric' => 'Ingresa un número de documento válido.',
            'email.unique' => 'Este correo electrónico ya se encuentra registrado.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'phone_number.unique' => 'Este número de celular ya se encuentra registrado.',
            'phone_number.digits' => 'Ingresa un número de celular válido.',
            'phone_number.numeric' => 'Ingresa un número de celular válido.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'birthdate.before_or_equal' => 'Debes tener 16 años o más.',
            'role_id.required' => 'Debes asignar un rol al usuario.',
            'image_profile.required' => 'Debes cargar una foto de perfil.',
            'image_profile.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, jpg, png, webp.',

        ];
    }

 
}
