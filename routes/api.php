<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TrainerController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(JwtMiddleware::class)->group(function () {
    Route::controller(TrainerController::class)->group(function () {
        Route::get('/trainers', 'listAll');
        Route::get('/trainer/{id}', 'show');
        Route::put('/trainer/{id}', 'update');
        Route::delete('/trainer/{id}', 'destroy');
    });

    Route::controller(PokemonController::class)->group(function () {
        Route::get('/pokemons', 'listAll');
        Route::get('/pokemon/{id}', 'show');
        Route::post('/pokemon', 'store');
        Route::put('/pokemon/{id}', 'update');
        Route::delete('/pokemon/{id}', 'destroy');
    });

});



Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
