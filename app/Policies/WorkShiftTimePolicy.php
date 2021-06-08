<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkShiftTime;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkShiftTimePolicy
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
        if ( ! $user->hasPermissionTo('list_work_shift_times')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param User          $user
     * @param WorkShiftTime $workShiftTime
     *
     * @return mixed
     */
    public function view(User $user, WorkShiftTime $workShiftTime)
    {
        if ( ! $user->hasPermissionTo('show_work_shift_time')) {

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
        if ( ! $user->hasPermissionTo('create_work_shift_time')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User          $user
     * @param WorkShiftTime $workShiftTime
     *
     * @return mixed
     */
    public function update(User $user, WorkShiftTime $workShiftTime)
    {
        if ( ! $user->hasPermissionTo('update_work_shift_time')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param User          $user
     * @param WorkShiftTime $workShiftTime
     *
     * @return mixed
     */
    public function delete(User $user, WorkShiftTime $workShiftTime)
    {
        if ( ! $user->hasPermissionTo('delete_work_shift_time')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param User          $user
     * @param WorkShiftTime $workShiftTime
     *
     * @return mixed
     */
    public function restore(User $user, WorkShiftTime $workShiftTime)
    {
        if ( ! $user->hasPermissionTo('remote_work_shift_time')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User          $user
     * @param WorkShiftTime $workShiftTime
     *
     * @return mixed
     */
    public function forceDelete(User $user, WorkShiftTime $workShiftTime)
    {
        //
    }
}
