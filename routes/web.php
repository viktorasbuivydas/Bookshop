<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/books/approve', 'BookController@index')->name('admin.books.approve');
Route::resource('books', 'BookController');

//books
Route::group(['prefix' => 'user', 'as'=>'user.', 'middleware' => 'auth'], function(){
    Route::resource('books', User\BookController::class);
    Route::resource('settings', User\SettingController::class);
    Route::post('reports/{book}', 'User\ReportController@store')->name('reports.store');
});

Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware' => 'checkRole:admin'], function(){
    Route::resource('genres', Admin\GenreController::class);
    Route::resource('authors', Admin\AuthorController::class);
    Route::resource('reviews', Admin\ReviewController::class);
    Route::resource('reports', Admin\ReportController::class);
});
