<?php

namespace App\Listeners;

use App\Events\AppointmentCreated;
use App\Jobs\ProcessAppointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AppointmentCreatedListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\AppointmentCreated  $event
     * @return void
     */
    public function handle(AppointmentCreated $event)
    {
        // Disparar o job para processar o agendamento
        ProcessAppointment::dispatch($event->appointment->id);
    }
}