<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Personne;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin',function(Personne $pr){
            return $pr->role==='admin';
        });
        Gate::define('user',function(Personne $pr){
            return $pr->role==='user';
        });
    }
}
