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
Route::post('/login/custom',[
	'uses' => 'CustomLoginController@login',
	'as' => 'login.custom'
]);


Route::group(['prefix' => 'Admin'], function () {
	Route::get('Home', 'Admin\HomeController@index');
})->middleware('auth');


Route::group(['prefix' => 'Staff'], function () {
	Route::get('Home', 'Staff\HomeController@index');
})->middleware('auth');