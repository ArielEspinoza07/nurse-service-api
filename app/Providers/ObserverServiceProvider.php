<?php

namespace App\Providers;

use \App\Models;
use App\Observers;
use Illuminate\Support\ServiceProvider;

/**
 * Class ObserverServiceProvider
 * @property array observers
 *
 * @package App\Providers
 */
class ObserverServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $observers = [
        Models\MedicalNote::class   => Observers\MedicalNoteObserver::class,
        Models\User::class          => Observers\UserObserver::class,
        Models\WorkShiftTime::class => Observers\WorkShiftTimeObserver::class,
    ];


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->observers as $model => $observer) {
            $model::observe($observer);
        }
    }
}
