<?php

namespace App\Providers;

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
    private $observers = [
        '\App\Models\MedicalNote' => Observers\MedicalNoteObserver::class,
        '\App\Models\User'        => Observers\UserObserver::class,
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
