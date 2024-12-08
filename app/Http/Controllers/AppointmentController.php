<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Services\AppointmentService;
use App\Jobs\ProcessAppointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function listAll()
    {
        return AppointmentResource::collection($this->appointmentService->getAll());
    }

    public function store(AppointmentRequest $request)
    {
        $data = $request->validated();
        $data['status'] = 'pending';

        $appointment = $this->appointmentService->create($data);

        ProcessAppointment::dispatch($appointment->id);

        return new AppointmentResource($appointment);
    }

    public function show($id)
    {
        $appointment = $this->appointmentService->findById($id);
        return new AppointmentResource($appointment);
    }
}