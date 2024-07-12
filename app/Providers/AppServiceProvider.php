<?php

namespace App\Providers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();



        $topUsers = Cache::remember('topUsers', now()->addMinutes(), function () {
            $topIdeas = Idea::with('user:id,name,image', 'comments.user:id,name,image')->latest()->get()->sortByDesc('likes')->take(5);
            return $topIdeas->unique('user_id')->take(5)->values();
        });
        $users = User::all();
        View::share('topUsers', $users->whereIn('id', $topUsers->pluck('user_id')));
    }
}
