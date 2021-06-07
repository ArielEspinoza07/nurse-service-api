<?php

namespace App\Observers;

use App\Models\MedicalNote;

class MedicalNoteObserver
{

    /**
     * Handle the User "creating" event.
     *
     * @param MedicalNote $medicalNote
     *
     * @return void
     */
    public function creating(MedicalNote $medicalNote)
    {
        $medicalNote->user_id = auth()->id();
    }


    /**
     * Handle the User "created" event.
     *
     * @param MedicalNote $medicalNote
     *
     * @return void
     */
    public function created(MedicalNote $medicalNote)
    {
    }


    /**
     * Handle the User "updated" event.
     *
     * @param MedicalNote $medicalNote
     *
     * @return void
     */
    public function updated(MedicalNote $medicalNote)
    {
    }


    /**
     * Handle the User "saving" event.
     *
     * @param MedicalNote $medicalNote
     *
     * @return void
     */
    public function saving(MedicalNote $medicalNote)
    {
    }


    /**
     * Handle the User "deleted" event.
     *
     * @param MedicalNote $medicalNote
     *
     * @return void
     */
    public function deleted(MedicalNote $medicalNote)
    {
    }


    /**
     * Handle the User "restored" event.
     *
     * @param MedicalNote $medicalNote
     *
     * @return void
     */
    public function restored(MedicalNote $medicalNote)
    {
        //
    }


    /**
     * Handle the User "force deleted" event.
     *
     * @param MedicalNote $medicalNote
     *
     * @return void
     */
    public function forceDeleted(MedicalNote $medicalNote)
    {
        //
    }
}
