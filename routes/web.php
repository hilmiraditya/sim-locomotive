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

    Route::get('Akun/LihatAkun', 'Admin\AkunController@index');
    Route::get('Akun/Hapus/{id}', 'Admin\AkunController@delete');

    Route::get('Akun/Tambah', 'Admin\AkunController@create');
    Route::post('Akun/Tambah', 'Admin\AkunController@createdata');

    Route::get('Akun/Ubah/{id}', 'Admin\AkunController@update');
    Route::post('Akun/Ubah', 'Admin\AkunController@updatedata');

    Route::get('PengaturanAkun', 'Admin\PengaturanAkunController@update');
    Route::post('PengaturanAkun', 'Admin\PengaturanAkunController@updatedata');

    Route::get('Produk/LihatProduk', 'Admin\ProdukController@index');
	});
	
	Route::group(['prefix' => 'Staff', 'middleware' => 'staff'], function () {
		Route::get('Home', 'Staff\HomeController@index');
    Route::get('PengaturanAkun', 'Admin\PengaturanAkunController@update');
    Route::post('PengaturanAkun', 'Admin\PengaturanAkunController@updatedata');
	});
});