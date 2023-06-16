<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    // ---------------------------------- \\
    public function viewAdmin(User $user){
        return $user->role->name === 'Administrador';
    }

    // ---------------------------------- \\
    public function viewLider(User $user){
        return $user->role->name === 'Lider';
    }

    // ---------------------------------- \\
    public function manageParticipants(User $user, Activity $activity) {
        return $user->id === $activity->author_id;
    }

    

}
