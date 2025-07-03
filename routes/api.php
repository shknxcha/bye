<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//import controller ProductController
use App\Http\Controllers\Api\SensorController;
use App\Http\Controllers\Api\TanamanController;
use App\Http\Controllers\Api\JenisTanamanController;

//products
Route::apiResource('/sensors', SensorController::class);
Route::apiResource('/tanaman', TanamanController::class);
Route::apiResource('jenis-tanaman', JenisTanamanController::class);
Route::get('/jenis-tanaman/{id}', [JenisTanamanController::class, 'show']);