<?php

namespace App\Listeners;

use App\Events\RoleChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogRoleChange
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RoleChanged $event)
    {
        activity('role-change')
            ->causedBy(auth()->user()) // User yang mengubah role
            ->performedOn($event->user) // User yang rolenya berubah
            ->event('updated')
            ->withProperties([
                'old_roles' => $event->oldRoles,
                'new_roles' => $event->newRoles,
            ])->log('updated');
            // ->log("User {$event->user->name} role changed from ".implode(', ', $event->oldRoles)." to ".implode(', ', $event->newRoles));
    }
}
