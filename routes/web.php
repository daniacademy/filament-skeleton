<?php

use App\Http\Middleware\AuthenticateHealthWithBasicAuth;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckJsonResultsController;

Route::get('/', function () {
    return view('welcome');
});

// Healthcheck
Route::get('health', HealthCheckJsonResultsController::class)
    ->middleware(AuthenticateHealthWithBasicAuth::class);
