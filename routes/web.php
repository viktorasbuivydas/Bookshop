<?php

use Illuminate\Support\Facades\Route;

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
//books
Route::get('/books', 'BookController@index')->name('mybooks');
Route::get('/book/create', 'BookController@create')->name('book.create');
Route::get('/book/edit/{id}', 'BookController@edit')->name('book.edit');
Route::post('/book/create', 'BookController@store')->name('book.store');
Route::put('/book/edit/{id}', 'BookController@update')->name('book.update');


Route::get('/genres', 'GenreController@index')->name('genres');
Route::get('/genre/create', 'GenreController@create')->name('genre.create');
Route::get('/genre/edit/{id}', 'GenreController@edit')->name('genre.edit');
Route::post('/genre/create', 'GenreController@store')->name('genre.store');
Route::put('/genre/edit/{id}', 'GenreController@update')->name('genre.update');
Route::delete('/genre/delete/{id}', 'GenreController@destroy')->name('genre.destroy');

Route::get('/authors', 'AuthorController@index')->name('authors');
Route::get('/author/create', 'AuthorController@create')->name('author.create');
Route::get('/author/edit/{id}', 'AuthorController@edit')->name('author.edit');
Route::post('/author/create', 'AuthorController@store')->name('author.store');
Route::put('/author/edit/{id}', 'AuthorController@update')->name('author.update');
Route::delete('/author/delete/{id}', 'AuthorController@destroy')->name('author.destroy');

Route::get('/reviews', 'ReviewController@index')->name('reviews');
Route::get('/review/create', 'ReviewController@create')->name('review.create');
Route::get('/review/edit/{id}', 'ReviewController@edit')->name('review.edit');
Route::post('/review/create', 'ReviewController@store')->name('review.store');
Route::put('/review/edit/{id}', 'ReviewController@update')->name('review.update');


Route::get('/reports', 'ReportController@index')->name('reports');
Route::get('/report/create', 'ReportController@create')->name('report.create');
Route::get('/report/edit/{id}', 'ReportController@edit')->name('report.edit');
Route::post('/report/create', 'ReportController@store')->name('report.store');
Route::put('/report/edit/{id}', 'ReportController@update')->name('report.update');

