<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ( ! $user->hasPermissionTo('list_users')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param User $model
     *
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        if ( ! $user->hasPermissionTo('show_user')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        if ( ! $user->hasPermissionTo('create_user')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param User $model
     *
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        if ( ! $user->hasPermissionTo('update_user')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param User $model
     *
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        if ( ! $user->hasPermissionTo('delete_user')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param User $model
     *
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        if ( ! $user->hasPermissionTo('restore_user')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param User $model
     *
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
