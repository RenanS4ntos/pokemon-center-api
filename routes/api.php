<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicalRecordController;
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

    Route::controller(DoctorController::class)->group(function () {
        Route::get('/doctors', 'listAll');
        Route::get('/doctor/{id}', 'show');
        Route::post('/doctor', 'store');
    });

    Route::controller(MedicalRecordController::class)->group(function () {
        Route::get('/medicalRecords', 'listAll');
        Route::get('/medicalRecords/{id}', 'show');
        Route::post('/medicalRecords', 'store');
    });

    Route::controller(AppointmentController::class)->group(function () {
        Route::get('/appointments', 'listAll');
        Route::get('/appointment/{id}', 'show');
        Route::post('/appointment', 'store');
    });
});



Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
