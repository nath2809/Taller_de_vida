<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterActivityRequest extends FormRequest
{
    
     // Determine if the user is authorized to make this request.
     
    public function authorize(): bool
    {
        return true;
    }

     
    //Reglas para poder insertar los datos de la ACTIVIDAD en la base de datos

    public function rules(): array
    {
        return [
            'type' => 'required',
            'name' => 'required',
            'description' => 'required',
            'region' =>'required',
            'city' =>'required',
            'attendance' => 'required|mimes:csv,txt,xls,ppt,pdf,docx',
            'report' => 'required|mimes:csv,txt,xls,ppt,pdf,docx',
            'participants' => 'required',
            'image_activity' => 'required |mimes:jpeg,jpg,png,webp,avif|max:10240',
            'pictures' => 'required|array|max:6',
            'pictures.*' => 'mimes:jpeg,jpg,png,webp,avif|max:10240',
        ];
    }

    //Mensajes de ERROR en caso de que no se cumpla alguna regla


    public function messages()
    {
        return [
        'attendance.mimes' => 'La extencion del archivo no es soportada',
        'report.mimes' => 'La extencion del archivo no es soportada',
        'image_activity.mimes' => 'La extencion de la imagen no es soportada',
        'pictures.mimes' => 'La extencion de la imagen no es soportada',
        
        ];
    }
}
