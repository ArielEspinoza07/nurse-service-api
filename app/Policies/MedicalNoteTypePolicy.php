<?php

namespace App\Policies;

use App\Models\MedicalNoteType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalNoteTypePolicy
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
        if ( ! $user->hasPermissionTo('list_note_types')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param User            $user
     * @param MedicalNoteType $medicalNoteType
     *
     * @return mixed
     */
    public function view(User $user, MedicalNoteType $medicalNoteType)
    {
        if ( ! $user->hasPermissionTo('show_note_type')) {

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
        if ( ! $user->hasPermissionTo('create_note_type')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User            $user
     * @param MedicalNoteType $medicalNoteType
     *
     * @return mixed
     */
    public function update(User $user, MedicalNoteType $medicalNoteType)
    {
        if ( ! $user->hasPermissionTo('update_note_type')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param User            $user
     * @param MedicalNoteType $medicalNoteType
     *
     * @return mixed
     */
    public function delete(User $user, MedicalNoteType $medicalNoteType)
    {
        if ( ! $user->hasPermissionTo('delete_note_type')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param User            $user
     * @param MedicalNoteType $medicalNoteType
     *
     * @return mixed
     */
    public function restore(User $user, MedicalNoteType $medicalNoteType)
    {
        if ( ! $user->hasPermissionTo('restore_note_type')) {

            return false;
        }

        return true;
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User            $user
     * @param MedicalNoteType $medicalNoteType
     *
     * @return mixed
     */
    public function forceDelete(User $user, MedicalNoteType $medicalNoteType)
    {
        //
    }
}
