<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
use App\Models\User;
use App\Models\Thing;
use Illuminate\Support\Facades\Auth;
use App\Policies\ThingPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        thing::class => ThingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update_thing', function(User $user, Thing $thing){
            if (Auth::id() == $thins->master_id){
                return Response::allow();
            }
            else 
                return Response::deny('Вы не является владельцем предмета');
        });
    }
}