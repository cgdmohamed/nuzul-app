<?php

//new line added
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Admin\LocationApiController;
use App\Http\Controllers\Api\V1\Admin\TaskApiController;
use App\Http\Controllers\Api\V1\Admin\UnitApiController;
use App\Http\Controllers\Api\V1\Admin\UserAlertApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JWTAuthController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', UserApiController::class);

    // User Alert
    Route::apiResource('user-alerts', UserAlertApiController::class);

    // Units
    Route::post('units/media', [UnitApiController::class, 'storeMedia'])->name('units.store_media');
    Route::apiResource('units', UnitApiController::class);

    // Task
    Route::post('tasks/media', [TaskApiController::class, 'storeMedia'])->name('tasks.store_media');
    Route::apiResource('tasks', TaskApiController::class);

    // Locations
    Route::apiResource('locations', LocationApiController::class);
    
    //logout
});

//API Login
//Route::post('login', [AuthController::class,'login']);

Route::controller(JWTAuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    //Route::post('register', 'register');
    Route::post('refresh', 'refresh');
});
