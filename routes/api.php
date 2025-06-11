<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\TypeEmploymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/locations', [LocationController::class, 'index']);
Route::apiResource('typeEmployment', TypeEmploymentController::class);