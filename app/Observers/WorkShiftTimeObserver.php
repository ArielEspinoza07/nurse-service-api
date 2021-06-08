<?php

namespace App\Observers;

use App\Models\WorkShiftTime;

class WorkShiftTimeObserver
{

    /**
     * Handle the WorkShiftTime "creating" event.
     *
     * @param WorkShiftTime $workShiftTime
     *
     * @return void
     */
    public function creating(WorkShiftTime $workShiftTime)
    {
    }


    /**
     * Handle the WorkShiftTime "created" event.
     *
     * @param WorkShiftTime $workShiftTime
     *
     * @return void
     */
    public function created(WorkShiftTime $workShiftTime)
    {
    }


    /**
     * Handle the WorkShiftTime "updated" event.
     *
     * @param WorkShiftTime $workShiftTime
     *
     * @return void
     */
    public function updated(WorkShiftTime $workShiftTime)
    {
    }


    /**
     * Handle the WorkShiftTime "saving" event.
     *
     * @param WorkShiftTime $workShiftTime
     *
     * @return void
     */
    public function saving(WorkShiftTime $workShiftTime)
    {
        $workShiftTime->start_at = date('H:i', strtotime($workShiftTime->start_at));
        $workShiftTime->end_at   = date('H:i', strtotime($workShiftTime->end_at));
    }


    /**
     * Handle the WorkShiftTime "deleted" event.
     *
     * @param WorkShiftTime $workShiftTime
     *
     * @return void
     */
    public function deleted(WorkShiftTime $workShiftTime)
    {
        //
    }


    /**
     * Handle the WorkShiftTime "restored" event.
     *
     * @param WorkShiftTime $workShiftTime
     *
     * @return void
     */
    public function restored(WorkShiftTime $workShiftTime)
    {
        //
    }


    /**
     * Handle the WorkShiftTime "force deleted" event.
     *
     * @param WorkShiftTime $workShiftTime
     *
     * @return void
     */
    public function forceDeleted(WorkShiftTime $workShiftTime)
    {
        //
    }
}
