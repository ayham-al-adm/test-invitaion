<?php

namespace App\Providers;

use App\Models\Invitation;
use App\Observers\InvitationObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Invitation::observe(InvitationObserver::class);
    }
}
