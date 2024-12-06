<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Services\DoctorService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    protected $doctorService;

    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }

    public function index()
    {
        return DoctorResource::collection($this->doctorService->getAll());
    }

    public function store(DoctorRequest $request)
    {
        $doctor = $this->doctorService->create($request->validated());
        return new DoctorResource($doctor);
    }

    public function show($id)
    {
        $doctor = $this->doctorService->findById($id);
        return new DoctorResource($doctor);
    }

    public function update(DoctorRequest $request, $id)
    {
        $doctor = $this->doctorService->update($id, $request->validated());
        return new DoctorResource($doctor);
    }

    public function destroy($id)
    {
        $this->doctorService->delete($id);
        return response()->noContent();
    }
}