<?php

namespace App\Providers;

use App\Events\AddNewAttendance;
use App\Events\AddNewInvitation;
use App\Listeners\SendInvitationMail;
use App\Listeners\SendWelcomeAttendMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AddNewInvitation::class => [
            SendInvitationMail::class,
        ],
        AddNewAttendance::class => [
            SendWelcomeAttendMail::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
