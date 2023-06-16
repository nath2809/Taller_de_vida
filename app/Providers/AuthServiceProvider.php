<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Models\User; // Asegúrate de importar el modelo User
use App\Models\Activity; // Asegúrate de importar el modelo User

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        
        User::class => UserPolicy::class,
        Activity::class => UserPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

    }
}
