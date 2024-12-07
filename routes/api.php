<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;

// Route::middleware(JwtMiddleware::class)->group(function () {

//     Route::middleware(JwtMiddleware::class)->group(function () {
//         Route::controller(ItemController::class)->group(function () {
//             Route::post('/items', 'store');
//             Route::patch('/items/{id}', 'update');
//             Route::delete('/items/{id}', 'destroy');
//         });

//         Route::controller(ItemTypeController::class)->group(function () {
//             Route::post('/item_types', 'store');
//             Route::patch('/item_types/{id}', 'update');
//             Route::delete('/item_types/{id}', 'destroy');
//         });

//     });
// });


Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
