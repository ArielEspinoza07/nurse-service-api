<?php

namespace App\Observers;

use App\Models\Permission;

class PermissionObserver
{

    /**
     * Handle the Role "creating" event.
     *
     * @param Permission $permission
     *
     * @return void
     */
    public function creating(Permission $permission)
    {
        $guards                 = array_keys(config('auth.guards'));
        $permission->guard_name = head($guards);
    }


    /**
     * Handle the Permission "created" event.
     *
     * @param \App\Models\Permission $permission
     *
     * @return void
     */
    public function created(Permission $permission)
    {
        //
    }


    /**
     * Handle the Permission "updated" event.
     *
     * @param \App\Models\Permission $permission
     *
     * @return void
     */
    public function updated(Permission $permission)
    {
        //
    }


    /**
     * Handle the Permission "deleted" event.
     *
     * @param \App\Models\Permission $permission
     *
     * @return void
     */
    public function deleted(Permission $permission)
    {
        //
    }


    /**
     * Handle the Permission "restored" event.
     *
     * @param \App\Models\Permission $permission
     *
     * @return void
     */
    public function restored(Permission $permission)
    {
        //
    }


    /**
     * Handle the Permission "force deleted" event.
     *
     * @param \App\Models\Permission $permission
     *
     * @return void
     */
    public function forceDeleted(Permission $permission)
    {
        //
    }
}
