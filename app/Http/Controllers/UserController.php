<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{

    // ------------------------- \\

    public function index(Request $request){

        if(!Auth::check()){
            return redirect('/');
        }

        //--- Variables para los filtros --\\

        $fechaInicio = $request->input('start_date');
        $fechaFin = $request->input('final_date');
        $status = $request->input('status');
        $searchTerm = $request->input('search');
        
        $data = DB::table('users')
            ->when($fechaInicio && $fechaFin, function ($query) use ($fechaInicio, $fechaFin) {
                return $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
            })
            ->when($searchTerm, function ($query) use ($searchTerm) {
                return $query->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%')
                      ->orWhere('document_number', 'like', '%' . $searchTerm . '%');
                });
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->paginate(40); // paginar los resultados
        
            $count = $data->total();
            $requestQuery = "start_date=$request->start_date&final_date=$request->final_date&status=$request->status&search=$request->search";

        
        return view('home.lideres.users', compact('data','count', 'requestQuery'));
    }

    // ------------------------- \\

    public function store_show(Request $request){

        if(!Auth::check()){
            return redirect('/');
        }

       $roles = Role::all();
       $departamentos = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json?$select=distinct%20departamento')->json();
       $ciudades = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json')->json();

        return view('home.lideres.user_create', ['roles' => $roles, 'departamentos' => $departamentos, 'ciudades'=>$ciudades]);
    
    }

    // ------------------------- \\

    public function store(RegisterRequest $request){

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
        $user->role_id = $request->get('role_id');
        $user->password = Hash::make($request->get('password'));

        // Condicional para verificar que en el input este cargado un archivo
        if($request->hasFile('image_profile')){
            $file = $request->file('image_profile');
            $filename = 'IP-'.time().rand().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/users/',$filename);
            $user->image_profile = $filename;
        }

        $user->save($request->validated());
        return redirect('/users')->with('create_user', 'ok');
    }

    // ------------------------- \\

    public function edit($id){

        if(!Auth::check()){
            return redirect('/');
        }

        $roles = Role::all();
        $user = User::findOrFail($id);
        $departamentos = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json?$select=distinct%20departamento')->json();
        $ciudades = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json')->json();
        return view('home.lideres.user_edit', compact('user','roles', 'departamentos', 'ciudades'));
    }

    // ------------------------- \\

    public function update(UpdateUserRequest $request, $id){

        $datosUser = request()->except(['_token','_method']);

        User::where('id', '=', $id)->update($datosUser);

        $user = User::findOrFail($id);
        return redirect('/users')->with('editar', 'ok');
        
    }

    // ------------------------- \\

    public function view($id){

        if(!Auth::check()){
            return redirect('/');
        }

        $user = User::findOrFail($id);
        
        // Obtener todas las actividades del usuario
        $participatedActivities = $user->activities->sortByDesc('created_at');
        $activitiesAuthor = Activity::where('author_id', $id)->latest()->get();

        return view('home.lideres.view_user', compact('user', 'participatedActivities','activitiesAuthor'));

    }

    // ------------------------- \\

    public function exportUser(Request $request){

        $fechaInicio = $request->start_date;
        $fechaFin = $request->final_date;
        $status=$request->status;
        $searchTerm=$request->search;
        $name=$request->name;
        $surnames=$request->surnames;
        $type_document=$request->type_document;
        $document_number=$request->document_number;
    
        $query = new User();

        if (isset($fechaInicio) && isset($fechaFin)) {
            $query =$query->whereDate('created_at', '>=', $fechaInicio)->whereDate('created_at', '<=', $fechaFin);
        }

        if (isset($name)) {
            $query = $query->where('name',$name);
        }
        if (isset($lastname)){
            $query = $query->where('surnames',$surnames);
        }
        if(isset($type_document)){
            $query =$query->where('type_document',$type_document);
        }
        if(isset($document_number)){
            $query =$query->where('document_number',$document_number);

        }
        if(isset($status)){
            $query =$query->where('status', $status);
        }

        if (isset($searchTerm)) {
            $query =$query->where('name', 'LIKE', '%'.$searchTerm.'%');
        }
    
        $all = $query->get();

        return Excel::download(new UsersExport($all), 'Lideres.xls');


    }



}
