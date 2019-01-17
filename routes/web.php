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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'AjaxdataController@index')->name('userajax');
Route::get('/user/getdata', 'AjaxdataController@getdata')->name('userajax.getdata');
Route::post('/user/postdata', 'AjaxdataController@postdata')->name('userajax.postdata');
Route::get('/user/fetchdata', 'AjaxdataController@fetchdata')->name('userajax.fetchdata');

Route::resource('bike','bikeController');