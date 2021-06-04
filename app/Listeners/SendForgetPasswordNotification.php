<?php

namespace App\Listeners;

use App\Events\ForgetPassword;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendForgetPasswordNotification
{

    /**
     * Handle the event.
     *
     * @param ForgetPassword $event
     *
     * @return void
     */
    public function handle(ForgetPassword $event)
    {
        Password::sendResetLink($event->credentials);
    }
}
