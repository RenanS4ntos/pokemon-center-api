<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function index()
    {
        return AppointmentResource::collection($this->appointmentService->getAll());
    }

    public function store(AppointmentRequest $request)
    {
        $appointment = $this->appointmentService->create($request->validated());
        return new AppointmentResource($appointment);
    }

    public function show($id)
    {
        $appointment = $this->appointmentService->findById($id);
        return new AppointmentResource($appointment);
    }

    public function update(AppointmentRequest $request, $id)
    {
        $appointment = $this->appointmentService->update($id, $request->validated());
        return new AppointmentResource($appointment);
    }

    public function destroy($id)
    {
        $this->appointmentService->delete($id);
        return response()->noContent();
    }
}