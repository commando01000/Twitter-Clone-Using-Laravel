<?php

namespace App\Providers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->is_admin;
        });

        Gate::define('edit-profile', function ($user) {
            return ((bool) $user->id == auth()->user()->id);
        });

        // Gate::define('edit-idea', function (User $user, Idea $idea) {
        //     return ((bool) $idea->user_id == $user->id);
        // });

        // Gate::define('edit-delete', function (User $user, Idea $idea) {
        //     return ((bool) $idea->user_id == $user->id);
        // });
    }
}
