<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('register/check', [App\Http\Controllers\Auth\RegisterController::class, 'check'])->name('api-register-check');
Route::get('provinces',  [App\Http\Controllers\Api\LocationController::class, 'provinces'])->name('api-provinces');
Route::get('regencies/{provinces_id}',  [App\Http\Controllers\Api\LocationController::class, 'regencies'])->name('api-regencies');