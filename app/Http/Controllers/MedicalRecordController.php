<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalRecordRequest;
use App\Http\Resources\MedicalRecordResource;
use App\Services\MedicalRecordService;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    protected $medicalRecordService;

    public function __construct(MedicalRecordService $medicalRecordService)
    {
        $this->medicalRecordService = $medicalRecordService;
    }

    public function listAll()
    {
        return MedicalRecordResource::collection($this->medicalRecordService->getAll());
    }

    public function store(MedicalRecordRequest $request)
    {
        $medicalRecord = $this->medicalRecordService->create($request->validated());
        return new MedicalRecordResource($medicalRecord);
    }

    public function show($id)
    {
        $medicalRecord = $this->medicalRecordService->findById($id);
        return new MedicalRecordResource($medicalRecord);
    }

}