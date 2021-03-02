<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', [App\Http\Controllers\IndexController::class, 'index'])->where('any', '.*');
/*
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('books/{book}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
//books
Route::group(['namespace' => 'User', 'prefix'=> 'user', 'as'=>'user.', 'middleware' => 'auth'], function(){
    Route::resource('books', BookController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('reviews', ReviewController::class);
    Route::post('reports/{book}', [App\Http\Controllers\User\ReportController::class, 'store'])->name('reports.store');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as'=>'admin.', 'middleware' => 'checkRole:admin'], function(){
    Route::resource('genres', GenreController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('books', BookController::class);
    Route::post('approve/{id}/{is_approved}', [App\Http\Controllers\Admin\BookController::class, 'approve'])->name('books.approve');
    Route::get('pending', [App\Http\Controllers\Admin\BookController::class, 'pending'])->name('books.pending');

});
 */

//Route::get('/{any}', [App\Http\Controllers\IndexController::class, 'index'])->where('any', '.*');
