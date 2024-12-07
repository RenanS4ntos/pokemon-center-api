<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonStoreRequest;
use App\Http\Requests\PokemonUpdateRequest;
use App\Http\Resources\PokemonResource;
use App\Services\PokemonService;

class PokemonController extends Controller
{
    protected $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function store(PokemonStoreRequest $request)
    {
        $pokemon = $this->pokemonService->create($request->validated());
        return new PokemonResource($pokemon);
    }

    public function listAll()
    {
        return PokemonResource::collection($this->pokemonService->getAll());
    }
    public function show($id)
    {
        $pokemon = $this->pokemonService->findById($id);
        return new PokemonResource($pokemon);
    }

    public function update(PokemonUpdateRequest $request, $id)
    {
        $pokemon = $this->pokemonService->update($id, $request->validated());
        return new PokemonResource($pokemon);
    }

    public function destroy($id)
    {
        $this->pokemonService->delete($id);
        return response()->noContent();
    }
}