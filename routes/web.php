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
Route::get('/nyoba', function () {
    return view('login');
});
Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login',[
	'uses' => 'CustomLoginController@login',
	'as' => 'login.custom'
]);
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);
Route::get('register', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix' => 'Admin', 'middleware' => 'admin'], function () {
		Route::get('Home', 'Admin\HomeController@index');
	});
	
	Route::group(['prefix' => 'Staff', 'middleware' => 'staff'], function () {
		Route::get('Home', 'Staff\HomeController@index');
	});
});