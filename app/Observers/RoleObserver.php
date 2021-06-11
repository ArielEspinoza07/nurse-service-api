<?php

namespace App\Observers;

use App\Models\Role;

class RoleObserver
{

    /**
     * Handle the Role "creating" event.
     *
     * @param Role $role
     *
     * @return void
     */
    public function creating(Role $role)
    {
        $guards           = array_keys(config('auth.guards'));
        $role->guard_name = head($guards);
    }


    /**
     * Handle the Role "created" event.
     *
     * @param Role $role
     *
     * @return void
     */
    public function created(Role $role)
    {
        //
    }


    /**
     * Handle the Role "updated" event.
     *
     * @param Role $role
     *
     * @return void
     */
    public function updated(Role $role)
    {
        //
    }


    /**
     * Handle the Role "deleted" event.
     *
     * @param Role $role
     *
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }


    /**
     * Handle the Role "restored" event.
     *
     * @param Role $role
     *
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }


    /**
     * Handle the Role "force deleted" event.
     *
     * @param Role $role
     *
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
