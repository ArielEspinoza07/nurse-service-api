<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserObserver
 * @package App\Observers
 */
class UserObserver
{

    /**
     * Handle the User "creating" event.
     *
     * @param User $user
     *
     * @return void
     */
    public function creating(User $user)
    {
    }


    /**
     * Handle the User "created" event.
     *
     * @param User $user
     *
     * @return void
     */
    public function created(User $user)
    {
        $user->syncRoles('nurse');
        event(new Registered($user));
    }


    /**
     * Handle the User "updated" event.
     *
     * @param User $user
     *
     * @return void
     */
    public function updated(User $user)
    {
    }


    /**
     * Handle the User "saving" event.
     *
     * @param User $user
     *
     * @return void
     */
    public function saving(User $user)
    {
        $user->password = Hash::make($user->password);
    }


    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     *
     * @return void
     */
    public function deleted(User $user)
    {
    }


    /**
     * Handle the User "restored" event.
     *
     * @param User $user
     *
     * @return void
     */
    public function restored(User $user)
    {
        //
    }


    /**
     * Handle the User "force deleted" event.
     *
     * @param User $user
     *
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
