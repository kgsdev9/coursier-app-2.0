<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     *   {{dd(Auth::user()->role->nom == "utilisateur")}}
     */
    public function boot(): void
    {
        //
        Gate::define('administrateur', function(User $user) {
            return $user->role->nom == "administrateur";
        });

        Gate::define('manage_users', function(User $user) {
            return $user->role->nom == "utilisateur";
        });
    }
}
