<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkShift;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkShiftPolicy
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
        if ( ! $user->hasPermissionTo('list_work_shifts')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param User      $user
     * @param WorkShift $workShift
     *
     * @return mixed
     */
    public function view(User $user, WorkShift $workShift)
    {
        if ( ! $user->hasPermissionTo('show_work_shift')) {

            return false;
        }
        if ($workShift->user_id === $user->id) {

            return true;
        }

        return false;
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
        if ( ! $user->hasPermissionTo('create_work_shift')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User      $user
     * @param WorkShift $workShift
     *
     * @return mixed
     */
    public function update(User $user, WorkShift $workShift)
    {
        if ( ! $user->hasPermissionTo('update_work_shift')) {

            return false;
        }
        if ($workShift->user_id === $user->id) {

            return true;
        }

        return false;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param User      $user
     * @param WorkShift $workShift
     *
     * @return mixed
     */
    public function delete(User $user, WorkShift $workShift)
    {
        if ( ! $user->hasPermissionTo('delete_work_shift')) {

            return false;
        }
        if ($workShift->user_id === $user->id) {

            return true;
        }

        return false;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param User      $user
     * @param WorkShift $workShift
     *
     * @return mixed
     */
    public function restore(User $user, WorkShift $workShift)
    {
        if ( ! $user->hasPermissionTo('restore_work_shift')) {

            return false;
        }
        if ($workShift->user_id === $user->id) {

            return true;
        }

        return false;
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User      $user
     * @param WorkShift $workShift
     *
     * @return mixed
     */
    public function forceDelete(User $user, WorkShift $workShift)
    {
        //
    }
}
