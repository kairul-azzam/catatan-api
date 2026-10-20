<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CatatanController;
use Illuminate\Support\Facades\Route;

// Publik (tanpa token)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Dilindungi Sanctum (wajib token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profil', [AuthController::class, 'profil']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/catatan', [CatatanController::class, 'index']);
    Route::post('/catatan', [CatatanController::class, 'store']);
});