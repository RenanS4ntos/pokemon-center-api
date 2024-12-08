<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainerStoreRequest;
use App\Http\Requests\TrainerUpdateRequest;
use App\Http\Resources\TrainerResource;
use App\Services\TrainerService;


class TrainerController extends Controller
{
    protected $trainerService;

    public function __construct(TrainerService $trainerService)
    {
        $this->trainerService = $trainerService;
    }

    public function index()
    {
        return TrainerResource::collection($this->trainerService->getAll());
    }

    public function store(TrainerStoreRequest $request)
    {
        $trainer = $this->trainerService->create($request->validated());
        return new TrainerResource($trainer);
    }

    public function listAll()
    {
        return TrainerResource::collection($this->trainerService->getAll());
    }

    public function show($id)
    {
        $trainer = $this->trainerService->findById($id);
        return new TrainerResource($trainer);
    }

    public function update(TrainerUpdateRequest $request, $id)
    {
        $trainer = $this->trainerService->update($id, $request->validated());
        return new TrainerResource($trainer);
    }

    public function destroy($id)
    {
        $this->trainerService->delete($id);
        return response()->noContent();
    }
}