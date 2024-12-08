<?php

namespace App\Jobs;

use App\Models\Appointment;
use App\Mail\AppointmentProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Exception;

class ProcessAppointment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    protected $appointmentId;

    /**
     * Create a new job instance.
     *
     * @param int $appointmentId
     */
    public function __construct(int $appointmentId)
    {
        $this->appointmentId = $appointmentId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Encontre o agendamento pelo ID
        $appointment = Appointment::find($this->appointmentId);

        if ($appointment) {
            try {
                // Tente atualizar o status do agendamento para 'processed'
                $appointment->status = 'processed';
                $appointment->save();

                // Obter o e-mail do treinador através do Pokemon
                $trainerEmail = $appointment->pokemon->trainer->email;

                // Enviar e-mail de confirmação
                Mail::to($trainerEmail)->send(new AppointmentProcessed($appointment));
            } catch (Exception $e) {
                // Se ocorrer um erro, atualize o status do agendamento para 'reprocessed'
                $appointment->status = 'reprocessed';
                $appointment->save();

                // Re-lançar a exceção para que o job possa ser reprocessado pelo sistema de filas
                throw $e;
            }
        }
    }
}