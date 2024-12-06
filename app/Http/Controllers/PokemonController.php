<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Http\Resources\PokemonResource;
use App\Services\PokemonService;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    protected $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function index()
    {
        return PokemonResource::collection($this->pokemonService->getAll());
    }

    public function store(PokemonRequest $request)
    {
        $pokemon = $this->pokemonService->create($request->validated());
        return new PokemonResource($pokemon);
    }

    public function show($id)
    {
        $pokemon = $this->pokemonService->findById($id);
        return new PokemonResource($pokemon);
    }

    public function update(PokemonRequest $request, $id)
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