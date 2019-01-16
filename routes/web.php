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

Route::get('/bike', 'AjaxdataController@index')->name('bikeajax');
Route::get('/bike/{$id}', 'AjaxdataController@show')->name('bike.show');
Route::get('/bike/edit/{$id}', 'AjaxdataController@edit')->name('bike.edit');
Route::get('/bike/getdata', 'AjaxdataController@getdata')->name('bikeajax.getdata');
Route::post('/bike/postdata', 'AjaxdataController@postdata')->name('bikeajax.postdata');
Route::get('/bike/fetchdata', 'AjaxdataController@fetchdata')->name('bikeajax.fetchdata');
