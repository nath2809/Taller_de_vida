<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterActivityRequest;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;


class RegisterController extends Controller{
    
    // Funcion para cargar la vista 

    public function show(){
        
        if(Auth::check()){
            return redirect('/home');
        }

        $departamentos = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json?$select=distinct%20departamento')->json();
        $ciudades = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json')->json();
    
        return view('auth.register')->with(compact('departamentos', 'ciudades'));

    }

    // Funcion que permitira registrar un nuevo usuario

    public function register(RegisterRequest $request){

        $user = new User();
        
        $user->name = $request->get('name');
        $user->surnames = $request->get('surnames');
        $user->type_document = $request->get('type_document');
        $user->document_number = $request->get('document_number');
        $user->email = $request->get('email');
        $user->phone_number = $request->get('phone_number');
        $user->region = $request->get('region');
        $user->city = $request->get('city');
        $user->birthdate = $request->get('birthdate');
        $user->password = Hash::make($request->get('password'));
       // $user->password_confirmation = Hash::make($request->get('password_confirmation'));

        // Condicional para verificar que en el input este cargado un archivo
        if($request->hasFile('image_profile')){
            $file = $request->file('image_profile');
            $filename = 'IP-'.time().rand().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/users',$filename);
            $user->image_profile = $filename;
        }

            $user->save($request->validated());
            return redirect('/')->with('create_user', 'ok');
    }

    // Funcion que permitira registrar una nueva Actividad

    public function registerActivity(RegisterActivityRequest $request){

        $activity = new Activity();
        
        $activity->type = $request->get('type');
        $activity->name = $request->get('name');
        $activity->description = $request->get('description');
        $activity->author_id = Auth::id();
        $activity->region = $request->get('region');
        $activity->city = $request->get('city');
        $activity->participants = $request->get('participants');
        $activity->boys = $request->get('boys');
        $activity->girls = $request->get('girls');


        // Condicional para verificar que en el input este cargado un archivo
        if($request->hasFile('image_activity')){
            $file = $request->file('image_activity');
            $filename = 'lg-'.time().rand().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/activities',$filename);
            $activity->image_activity = $filename;
        }

        if($request->hasFile('attendance')){
            $file = $request->file('attendance');
            $filename = 'Asistencia-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/files',$filename);
            $activity->attendance = $filename;
        }

        if($request->hasFile('report')){
            $file = $request->file('report');
            $filename = 'Reporte-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/files',$filename);
            $activity->report = $filename;
        }

        //GUARDAR TODOS LOS DATOS DE REGISTRO DE LA ACTIVIDAD
        $activity->save();
        
        // Guardar cada archivo en la tabla "images"
        
        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $file) {
                $filename = 'lg-' . time() . rand() . '.webp';
                
                // Carga la imagen original
                $image = Image::make($file);
                
                // Redimensiona la imagen a un tamaño específico (opcional)
                $image->resize(300, 200);
                
                // Comprime la imagen con una calidad del 50% (ajusta según tus necesidades)
                $image->encode('webp', 80);
                
                // Guarda la imagen comprimida
                $path = $file->storeAs('public/images/activities', $filename);
                
                $activity->images()->create([
                    'filename' => $filename
                ]);
            }
        }
        
        return redirect('/activities')->with('create_activity', 'ok');

    }
}
