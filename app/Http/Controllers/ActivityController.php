<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\ActivityUser;
use App\Exports\ActivityExport;
use Maatwebsite\Excel\Facades\Excel;


class ActivityController extends Controller
{
    
    // ------------------------- \\

    public function index(Request $request){

        if(!Auth::check()){
            return redirect('/');
        }

        //--- Variables para los filtros --\\

        $fechaInicio = $request->input('start_date');
        $fechaFin = $request->input('final_date');
        $type = $request->input('type');
        $searchTerm = $request->input('searchActivity');
        $user = auth()->user();


        //--- CONSULTA DE LAS ACTIVIDADES - EN CASO DE QUE EL USER SEA LIDER, EJECUTA LO SIGUIENTE --\\
        
        $query = DB::table('activities')
        ->when($user->role_id == 2, function ($query) use ($user) {
            $query->where(function($q) use ($user) {
                        $q->where('author_id', $user->id)
                          ->orWhereIn('id', function($subquery) use ($user) {
                                $subquery->select('activity_id')
                                         ->from('activity_users')
                                         ->where('user_id', $user->id);
                          });
                  });
        })
        ->when($fechaInicio && $fechaFin, function ($query) use ($fechaInicio, $fechaFin) {
            $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        })
        ->when($searchTerm, function ($query) use ($searchTerm) {
            $query->where(function($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%');
                  });
        })
        ->when($type, function ($query) use ($type) {
            $query->where('type', $type);
        });
        
        $data = $query->paginate(40);
        $count = $data->total();
        $requestQuery = "type=$request->type&start_date=$request->start_date&final_date=$request->final_date&status=$request->status&searchActivity=$request->searchActivity";

        return view('home.activities.activities', compact('data','count', 'requestQuery'));
    }

    // -------------------------- \\
    
    public function view(Request $request, $id){

        if(!Auth::check()){
            return redirect('/');
        }

        $activity = Activity::findOrFail($id); // Obtiene la informacion de la actividad
        $author = User::findOrFail($activity->author_id); //Obtiene los datos del usuario que creo la actividad
        $images = $activity->images()->get(); // Obtiene todas las imágenes de la actividad
        $collaborator = $activity->users()->get(); // Obtiene los usuarios que ayudaron a crear la actividad
        // si existe una ruta de archivo, construye una URL de descarga
        $download_url = null;
        if ($activity->file_path) {
            $download_url = route('activity.download', ['id' => $activity->id]);
        }
        
        return view('home.activities.view_activity', compact('activity', 'author', 'images', 'collaborator','download_url'));

    }

    // -------------------------- \\

    public function create(Request $request){

        if(!Auth::check()){
            return redirect('/');
        }

        $users = User::all();
        $departamentos = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json?$select=distinct%20departamento')->json();
        $ciudades = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json')->json();

        return view('home.activities.create_activity')->with(compact('departamentos', 'ciudades', 'users'));

    }

    // -------------------------- \\

    public function edit($id){

        if(!Auth::check()){
            return redirect('/');
        }

        $activity = Activity::findOrFail($id);

        $departamentos = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json?$select=distinct%20departamento')->json();
        $ciudades = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json')->json();
        return view('home.activities.activity_edit', compact('activity','departamentos', 'ciudades'));
  
    }

    // -------------------------- \\

    public function update(Request $request, $id){

        // Obtener la actividad que se va a actualizar a través del ID:
        $activity = Activity::findOrFail($id);
        
        // Actualizar los datos de la actividad con los nuevos valores recibidos en la solicitud:
        $activity->type = $request->get('type');
        $activity->name = $request->get('name');
        $activity->description = $request->get('description');
        $activity->region = $request->get('region');
        $activity->city = $request->get('city');
        $activity->participants = $request->get('participants');
        $activity->boys = $request->get('boys');
        $activity->girls = $request->get('girls');
        
        // Verificar si se cargó un nuevo archivo de imagen/archivo de asistencia/archivo de informe, y eliminar la imagen/archivo anterior si existe:
        if ($request->hasFile('image_activity')) {
            if ($activity->image_activity) {
                Storage::delete('public/images/activities/' . $activity->image_activity);
            }
            $file = $request->file('image_activity');
            $filename = 'lg-' . time() . rand() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/activities', $filename);
            $activity->image_activity = $filename;
        }
        
        if ($request->hasFile('attendance')) {
            if ($activity->attendance) {
                Storage::delete('public/files/' . $activity->attendance);
            }
            $file = $request->file('attendance');
            $filename = 'Asistencia-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/files', $filename);
            $activity->attendance = $filename;
        }
        
        if ($request->hasFile('report')) {
            if ($activity->report) {
                Storage::delete('public/files/' . $activity->report);
            }
            $file = $request->file('report');
            $filename = 'Reporte-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/files', $filename);
            $activity->report = $filename;
        }
        
        // Guardar la actividad actualizada y redirigir a la lista de actividades:
        $activity->save();
        return redirect('/activities')->with('editar', 'ok');
    }
    
    // -------------------------- \\

    public function addParticipants(Request $request, $activityId){

        $activity = Activity::find($activityId);
    
        // Validamos que la actividad exista
        if (!$activity) {
            abort(404);
        }
    
        // Obtenemos los términos de búsqueda
        $terms = explode(',', $request->input('participants'));
    
        // Buscamos los usuarios que coincidan con los términos de búsqueda
        $users = User::whereIn('name', $terms)
                    ->orWhereIn('email', $terms)
                    ->get();
    
        // Agregamos los usuarios seleccionados a la actividad
        foreach ($users as $user) {
            // Verificamos si el usuario es el creador de la actividad
            if ($activity->author_id === $user->id) {
                continue; // El usuario es el creador, no se puede agregar como participante
            }
    
            if ($activity->users()->where('user_id', $user->id)->exists()) {
                continue; // El usuario ya es participante
            }
    
            $activityUser = new ActivityUser();
            $activityUser->user_id = $user->id;
            $activityUser->activity_id = $activity->id;
            $activityUser->created_at = $activity->created_at;
            $activityUser->updated_at = $activity->updated_at;
            $activityUser->save();
        }
    
        return redirect('activity/'. $activityId)->with('participant', 'ok');
    }
    
    // -------------------------- \\

    public function removeParticipant($activityId, $userId){

        $activity = Activity::find($activityId);

        // Validamos que la actividad exista
        if (!$activity) {
            abort(404);
        }

        // Obtenemos el usuario que deseamos eliminar de la actividad
        $user = User::find($userId);

        // Validamos que el usuario exista
        if (!$user) {
            abort(404);
        }

        // Verificamos que el usuario sea participante de la actividad
        if (!$activity->users()->where('user_id', $user->id)->exists()) {
            abort(404);
        }

        // Eliminamos al usuario de la actividad
        $activity->users()->detach($user->id);

        return redirect('activity/'. $activityId)->with('participantRemoved', 'ok');
    }

    // -------------------------- \\

    public function exportActivity(Request $request){
        $fechaInicio = $request->start_date;
        $fechaFin = $request->final_date;
        $type = $request->type;
        $searchTerm = $request->searchActivity;
        $user = auth()->user();
        $description = $request->description;
        $region = $request->region;
    
        $query = Activity::query();
    
        if (isset($fechaInicio) && isset($fechaFin)) {
            $query->whereDate('created_at', '>=', $fechaInicio)->whereDate('created_at', '<=', $fechaFin);
        }
        if (isset($type)) {
            $query->where('type', $type);
        }

        if (isset($searchTerm)) {
            $query->where('name', 'LIKE', '%'.$searchTerm.'%');
        }
        
        if (isset($description)) {
            $query->where('description', $description);
        }

        if (isset($region)) {
            $query->where('region', $region);
        }
    
        $all = $query->get();
    
        return Excel::download(new ActivityExport($all), 'Actividades.xls');
    }
    

}
