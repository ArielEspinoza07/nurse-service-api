<?php

namespace App\Observers;

use App\Models\WorkShift;

class WorkShiftObserver
{

    /**
     * Handle the WorkShift "creating" event.
     *
     * @param WorkShift $workShift
     *
     * @return void
     */
    public function creating(WorkShift $workShift)
    {
        $workShift->user_id = auth()->id();
    }


    /**
     * Handle the WorkShift "created" event.
     *
     * @param WorkShift $workShift
     *
     * @return void
     */
    public function created(WorkShift $workShift)
    {
        //
    }


    /**
     * Handle the WorkShift "updated" event.
     *
     * @param WorkShift $workShift
     *
     * @return void
     */
    public function updated(WorkShift $workShift)
    {
        //
    }


    /**
     * Handle the WorkShift "saving" event.
     *
     * @param WorkShift $workShift
     *
     * @return void
     */
    public function saving(WorkShift $workShift)
    {

    }


    /**
     * Handle the WorkShift "deleted" event.
     *
     * @param WorkShift $workShift
     *
     * @return void
     */
    public function deleted(WorkShift $workShift)
    {
        //
    }


    /**
     * Handle the WorkShift "restored" event.
     *
     * @param WorkShift $workShift
     *
     * @return void
     */
    public function restored(WorkShift $workShift)
    {
        //
    }


    /**
     * Handle the WorkShift "force deleted" event.
     *
     * @param WorkShift $workShift
     *
     * @return void
     */
    public function forceDeleted(WorkShift $workShift)
    {
        //
    }
}
