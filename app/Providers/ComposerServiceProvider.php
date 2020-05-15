<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Friend;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
        {if (Auth::check()) {
            $user = auth()->user();
            $view->with('request_count', $friend_requests = Friend::where('friend_id', $user->id)
                ->where('accept', 0)
                ->count()
            );
        }
        });
    }
}
