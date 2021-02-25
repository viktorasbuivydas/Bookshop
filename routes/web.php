<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('books', App\Http\Controllers\BookController::class);

//books
Route::group(['prefix' => 'user', 'as'=>'user.', 'middleware' => 'auth'], function(){
    Route::resource('books', User\BookController::class);
    Route::resource('settings', User\SettingController::class);
    Route::resource('reviews', User\ReviewController::class);
    Route::post('reports/{book}', [User\ReportController::class, 'store'])->name('reports.store');
});

Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware' => 'checkRole:admin'], function(){
    Route::resource('genres', Admin\GenreController::class);
    Route::resource('authors', Admin\AuthorController::class);
    Route::resource('reports', Admin\ReportController::class);
    Route::resource('books', Admin\BookController::class);
    Route::post('approve/{id}/{is_approved}', [App\Http\Controllers\Admin\BookController::class, 'approve'])->name('books.approve');
    Route::get('pending', [App\Http\Controllers\Admin\BookController::class, 'pending'])->name('books.pending');

});
