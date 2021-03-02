<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api', 'as' => 'api.', 'prefix' => 'v1'], function () {
    Route::post('/auth/register', [App\Http\Controllers\Api\V1\AuthController::class, 'register']);
    Route::post('/auth/login', [App\Http\Controllers\Api\V1\AuthController::class, 'login']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/me', function (Request $request) {
            return auth()->user();
        });

        Route::post('/auth/logout', [App\Http\Controllers\Api\V1\AuthController::class, 'logout']);
    });
});
