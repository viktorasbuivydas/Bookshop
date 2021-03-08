<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api\\V1', 'as' => 'api.', 'prefix' => 'v1'], function () {
    Route::post('/auth/register', [App\Http\Controllers\Api\V1\AuthController::class, 'register']);
    Route::post('/auth/login', [App\Http\Controllers\Api\V1\AuthController::class, 'login']);
    Route::apiResource('books', BookController::class, ['only' => ['index', 'show']]);
    // Api/v1/user/
    Route::group(['namespace' => 'User', 'prefix'=> 'user', 'as'=>'user.', 'middleware' => ['auth:sanctum']], function () {
        Route::get('/me', function (Request $request) {
            return auth()->user();
        });
        Route::apiResource('books', BookController::class);
        Route::apiResource('settings', SettingController::class, ['only' => ['index', 'store']]);
        Route::apiResource('reviews', ReviewController::class, ['only' => ['store']]);

        Route::get('home', [App\Http\Controllers\Api\V1\HomeController::class, 'index']);
        Route::post('reports/{book}', [App\Http\Controllers\Api\V1\User\ReportController::class, 'store']);
        Route::post('logout', [App\Http\Controllers\Api\V1\AuthController::class, 'logout']);
    });
    // Api/v1/admin/
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as'=>'admin.', 'middleware' => ['auth:sanctum', 'checkRole:admin']], function(){
        Route::apiResource('genres', GenreController::class);
        Route::apiResource('authors', AuthorController::class);
        Route::apiResource('reports', ReportController::class);
        Route::apiResource('books', BookController::class, ['only' => ['index', 'pending', 'show', 'approve']]);

        Route::post('approve/{id}/{is_approved}', [App\Http\Controllers\Admin\BookController::class, 'approve']);

    });
});


