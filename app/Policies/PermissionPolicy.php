<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
        if ( ! $user->hasPermissionTo('list_permissions')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param User       $user
     * @param Permission $permission
     *
     * @return mixed
     */
    public function view(User $user, Permission $permission)
    {
        if ( ! $user->hasPermissionTo('show_permission')) {

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
        if ( ! $user->hasPermissionTo('create_permission')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User       $user
     * @param Permission $permission
     *
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        if ( ! $user->hasPermissionTo('update_permission')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param User       $user
     * @param Permission $permission
     *
     * @return mixed
     */
    public function delete(User $user, Permission $permission)
    {
        if ( ! $user->hasPermissionTo('delete_permission')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param User       $user
     * @param Permission $permission
     *
     * @return mixed
     */
    public function restore(User $user, Permission $permission)
    {
        if ( ! $user->hasPermissionTo('restore_permission')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User       $user
     * @param Permission $permission
     *
     * @return mixed
     */
    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
