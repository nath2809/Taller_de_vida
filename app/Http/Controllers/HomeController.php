<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller 
{

    // ------------------------- \\

    public function index(){

        if(!Auth::check()){
            return redirect('/');
        }      
    
        $totalUsers = DB::table('users')->count();
        $totalActivities = DB::table('activities')->count();


        //--------------------- DATA PARA LOS GRAFICOS SOBRE LAS ACTIVIDADES -------------------------\\

        $user = Auth::user();
        $role = $user->role_id;
        
        // DATA PARA LOS GRAFICOS SOBRE ACTIVIDADES
        
        //VALIDACION DE ROLE

        if ($role == 1) {
            $activities = Activity::all();
        } 

        $activities = Activity::where('author_id', $user->id)->get();

            $ninos = $activities->sum('boys');
            $ninas = $activities->sum('girls');
            $data = [$ninos, $ninas];


            $activities = Activity::select('region','city','type', DB::raw('count(*) as total'))
            ->when($role != 1, function ($query) use ($user) {
            $query->where('author_id', $user->id);
            })
            ->groupBy('region','city', 'type')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

            $activitiesByRegion = $activities->groupBy('region')->map(function ($item) {
                return $item->sum('total');
            });
            
            $activitiesByCity = $activities->groupBy('city')->map(function ($item) {
                return $item->sum('total');
            });
            
            $activitiesByType = $activities->groupBy('type')->map(function ($item) {
                return $item->sum('total');
            });
            
            $labelsRegion = $activitiesByRegion->keys()->toJson();
            $totalRegion = $activitiesByRegion->values()->toJson();

            $labelsCity = $activitiesByCity->keys()->toJson();
            $totalCity = $activitiesByCity->values()->toJson();
            
            $labelsType = $activitiesByType->keys()->toJson();
            $totalType = $activitiesByType->values()->toJson();
            

        //--------------------- DATA PARA LOS GRAFICOS SOBRE LOS JOVENES POR REGIONES -------------------------\\

        // Obtener los datos de boys y girls por región

        $youthsByRegion = DB::table('activities')
            ->select('region', DB::raw('SUM(boys) as totalBoys'), DB::raw('SUM(girls) as totalGirls'))
            ->when($role != 1, function ($query) use ($user) {
                $query->where('author_id', $user->id);
            })
            ->groupBy('region')
            ->get();
        
            $labelsYouths = $youthsByRegion->pluck('region');
            $totalBoys = $youthsByRegion->pluck('totalBoys');
            $totalGirls = $youthsByRegion->pluck('totalGirls');
    


        //--------------------- DATA PARA LOS GRAFICOS SOBRE LIDERES -------------------------\\

        $UsersByCity = User::select('city', DB::raw('count(*) as total'))
            ->groupBy('city')
            ->orderByDesc('total')
            ->get();

            $labelsCityUsers = $UsersByCity->pluck('city')->toJson();
            $totalCityUsers = $UsersByCity->pluck('total')->toJson();

        //----------------------------------------------------------------------------\\

        $UsersByRegion = User::select('region', DB::raw('count(*) as total'))
            ->groupBy('region')
            ->orderByDesc('total')
            ->get();

            $labelsRegionUsers = $UsersByRegion->pluck('region')->toJson();
            $totalRegionUsers = $UsersByRegion->pluck('total')->toJson();

        //----------------------------------------------------------------------------\\

            $userWithMostActivities = null;
            $numActivities = 0;
            $hasActivities = DB::table('activities')->exists();
            
            if ($hasActivities) {
                $userWithMostActivities = User::join('activities', 'users.id', '=', 'activities.author_id')
                    ->select('users.id', 'users.name', 'users.surnames','users.image_profile', DB::raw('COUNT(activities.author_id) AS num_activities'))
                    ->groupBy('users.id', 'users.name', 'users.surnames', 'users.image_profile')
                    ->orderByDesc('num_activities')
                    ->first();
            
                $numActivities = $userWithMostActivities->num_activities;
            }

        //  --------------------------------------------------------------------------- \\

            $latestUser = User::latest()->first();
            
            $latestActivity = Activity::when($role != 1, function ($query) use ($user) {
                $query->where('author_id', $user->id);
            })
            ->latest()
            ->first();
        
        //  --------------------------------------------------------------------------- \\

        // CONSULTAS PARA LAS ACTIVIDADES DE LOS LIDERES

        $activityWithMostParticipants = Activity::where('author_id', $user->id)
        ->orderBy('participants', 'desc')
        ->first();   
        
        $latestUserActivity = Activity::join('activity_users', 'activities.id', '=', 'activity_users.activity_id')
        ->where('activity_users.user_id', $user->id)
        ->orderBy('activity_users.created_at', 'desc')
        ->first();

        //-----------------------------------------------------------------------------\\
            
            return view('home.index', compact('user','totalUsers', 'totalActivities', 'data', 'labelsCity', 'totalCity', 
            'labelsType', 'totalType', 'labelsCityUsers', 'totalCityUsers', 'labelsRegionUsers', 'totalRegionUsers', 
            'labelsRegion', 'totalRegion', 'labelsYouths', 'totalBoys', 'totalGirls', 'userWithMostActivities','numActivities', 
            'latestUser', 'latestActivity', 'activityWithMostParticipants', 'latestUserActivity'));

    }

}



