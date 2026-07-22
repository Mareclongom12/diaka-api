<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FavoriController;
use App\Http\Controllers\Api\ReciterController;
use App\Http\Controllers\Api\SourateController;
use Illuminate\Support\Facades\Route;


// Routes publiques
use App\Http\Controllers\Api\QuranTextController;

// ...
Route::get('/quran-reciters', [QuranTextController::class, 'reciters']);
Route::get('/quran-text/{numero}', [QuranTextController::class, 'verses']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/sourates', [SourateController::class, 'index']);
Route::get('/sourates/{id}', [SourateController::class, 'show']);
Route::get('/sourates/{id}/audios', [SourateController::class, 'audios']);
Route::get('/reciters', [ReciterController::class, 'index']);

// Routes protégées (nécessitent un token Sanctum valide)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', fn (Illuminate\Http\Request $request) => $request->user());

    Route::get('/favoris', [FavoriController::class, 'index']);
    Route::post('/favoris', [FavoriController::class, 'store']);
    Route::delete('/favoris/{id}', [FavoriController::class, 'destroy']);
});
