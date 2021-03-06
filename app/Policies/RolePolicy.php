<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
        if ( ! $user->hasPermissionTo('list_roles')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Role $role
     *
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        if ( ! $user->hasPermissionTo('show_role')) {

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
        if ( ! $user->hasPermissionTo('create_role')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Role $role
     *
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        if ( ! $user->hasPermissionTo('update_role')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Role $role
     *
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        if ( ! $user->hasPermissionTo('delete_role')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Role $role
     *
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        if ( ! $user->hasPermissionTo('restore_role')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Role $role
     *
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
