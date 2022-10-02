<?php

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

// URL: ~~~/
Route::get('/', function () {
    return view('welcome');
});

// URL: ~~~/admin/ de hajimaru
Route::group(['prefix' => 'admin','middleware' =>'auth'], function() {
    // URL: ===/news/create => ~~~/admin/news/create
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    
});

Route::group(['prefix' => 'admin'], function() {
    // URL: ===/news/create => ~~~/admin/news/create
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
});


// URL: ~~~/login
Auth::routes();

// URL: ~~~/home
Route::get('/home', 'HomeController@index')->name('home');



Route::get('admin/profile/create','Admin\ProfileController@create');

Route::get('admin/profile/edit','Admin\ProfileController@edit');

Route::get('admin/news/create','Admin\NewsController@add');