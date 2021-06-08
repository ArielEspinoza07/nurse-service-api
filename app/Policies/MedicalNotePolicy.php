<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MedicalNote;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalNotePolicy
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
        if ( ! $user->hasPermissionTo('list_notes')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param User        $user
     * @param MedicalNote $medicalNote
     *
     * @return mixed
     */
    public function view(User $user, MedicalNote $medicalNote)
    {
        if ( ! $user->hasPermissionTo('show_note')) {

            return false;
        }
        if ($medicalNote->user_id === $user->id) {

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
        if ( ! $user->hasPermissionTo('create_note')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User        $user
     * @param MedicalNote $medicalNote
     *
     * @return mixed
     */
    public function update(User $user, MedicalNote $medicalNote)
    {
        if ( ! $user->hasPermissionTo('update_note')) {

            return false;
        }
        if ($medicalNote->user_id === $user->id) {

            return true;
        }

        return false;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param User        $user
     * @param MedicalNote $medicalNote
     *
     * @return mixed
     */
    public function delete(User $user, MedicalNote $medicalNote)
    {
        if ( ! $user->hasPermissionTo('delete_note')) {

            return false;
        }
        if ($medicalNote->user_id === $user->id) {

            return true;
        }

        return false;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param User        $user
     * @param MedicalNote $medicalNote
     *
     * @return mixed
     */
    public function restore(User $user, MedicalNote $medicalNote)
    {
        if ( ! $user->hasPermissionTo('restore_note')) {

            return false;
        }
        if ($medicalNote->user_id === $user->id) {

            return true;
        }

        return false;
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User        $user
     * @param MedicalNote $medicalNote
     *
     * @return mixed
     */
    public function forceDelete(User $user, MedicalNote $medicalNote)
    {
    }
}
