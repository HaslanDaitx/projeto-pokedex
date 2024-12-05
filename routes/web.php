<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('pokemon', [PokemonController::class, 'index']);
Route::get('pokemon/create', [PokemonController::class, 'create']);
Route::post('pokemon', [PokemonController::class, 'store']);
Route::get('pokemon/{id}/edit', [PokemonController::class, 'edit']);
Route::put('pokemon/{id}', [PokemonController::class, 'update']);
Route::delete('pokemon/{id}', [PokemonController::class, 'destroy']);

Route::get('trainers', [TrainerController::class, 'index']);
Route::get('trainers/create', [TrainerController::class, 'create']);
Route::post('trainers', [TrainerController::class, 'store']);
Route::get('trainers/{id}/edit', [TrainerController::class, 'edit']);
Route::put('trainers/{id}', [TrainerController::class, 'update']);
Route::delete('trainers/{id}', [TrainerController::class, 'destroy']);