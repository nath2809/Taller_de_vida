<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    // ------------------------- \\

    public function index($id){

        if(!Auth::check()){
            return redirect('/');
        }

        return view('home.profile.profile');

    }
    
    // ------------------------- \\

    public function edit($id){

        if(!Auth::check()){
            return redirect('/');
        }
        
        $user = User::findOrFail($id);
        return view('home.profile.edit_profile', compact('user'));
    }

    // ------------------------- \\

    public function update(UpdateProfileRequest $request, $id){

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->surnames = $request->get('surnames');
        $user->type_document = $request->get('type_document');
        $user->document_number = $request->get('document_number');
        $user->email = $request->get('email');
        $user->phone_number = $request->get('phone_number');
        $user->region = $request->get('region');
        $user->city = $request->get('city');
        $user->birthdate = $request->get('birthdate');
    
        // Condicional para verificar que en el input este cargado un archivo
        if($request->hasFile('image_profile')){
            if ($user->image_profile) {
                Storage::delete('public/images/users/' . $user->image_profile);
            }
            $file = $request->file('image_profile');
            $filename = 'IP-'.time().rand().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/users/',$filename);
            $user->image_profile = $filename;
        }
    
        $user->save();
        return redirect('/profile{$id}')->with('editar','ok');
        
    }
}
