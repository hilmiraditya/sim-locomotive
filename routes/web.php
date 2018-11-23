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

Route::get('/', function () {return view('welcome');});
Route::get('login', ['as' => 'login','uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login',['uses' => 'CustomLoginController@login','as' => 'login.custom']);
Route::post('logout', ['as' => 'logout','uses' => 'Auth\LoginController@logout']);
Route::get('register', ['as' => 'register','uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => '','uses' => 'Auth\RegisterController@register']);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
	Route::group(['prefix' => 'Admin', 'middleware' => 'admin'], function () {
		Route::get('Home', 'Admin\HomeController@index');
    Route::group(['prefix' => 'Akun'], function () {
      Route::get('LihatAkun', 'Admin\AkunController@index');
      Route::get('Hapus/{id}', 'Admin\AkunController@delete');
      Route::get('Tambah', 'Admin\AkunController@create');
      Route::post('Tambah', 'Admin\AkunController@createdata');
      Route::get('Ubah/{id}', 'Admin\AkunController@update');
      Route::post('Ubah', 'Admin\AkunController@updatedata');    
    });
    Route::group(['prefix' => 'Produk'], function () {
      Route::get('LihatProduk', 'Admin\ProdukController@index');
      Route::get('TambahProduk', 'Admin\ProdukController@create');
      Route::post('TambahProduk', 'Admin\ProdukController@createdata');
      Route::get('UbahProduk/{id}', 'Admin\ProdukController@update');
      Route::post('UbahProduk', 'Admin\ProdukController@updatedata');
      Route::get('HapusProduk/{id}', 'Admin\ProdukController@delete');
      Route::get('DownloadPDF', 'Admin\ProdukController@exportPDF');
    });
    Route::group(['prefix' => 'Pesanan'], function () {
      Route::get('DaftarPesanan', 'Admin\PesananController@index');
      Route::get('TambahPesanan', 'Admin\PesananController@tambahpesanan_biodata');
      Route::post('TambahPesanan', 'Admin\PesananController@get_tambahpesanan_biodata');
      Route::get('LihatPesanan/{id}', 'Admin\PesananController@detil_pesanan');
      Route::get('UbahPesanan/{id}', 'Admin\PesananController@ubah_pesanan');
      Route::post('UbahPesanan/{id}', 'Admin\PesananController@get_ubah_pesanan');
      Route::post('UbahStatusPesanan/{id}', 'Admin\PesananController@ubah_status_pesanan');
      Route::get('HapusPesanan/{id}', 'Admin\PesananController@hapus_pesanan');
      Route::get('KirimEmail/{id}', 'Admin\PesananController@kirim_email_pesanan');
    });
    Route::get('PengaturanAkun', 'Admin\PengaturanAkunController@update');
    Route::post('PengaturanAkun', 'Admin\PengaturanAkunController@updatedata');
	});
	Route::group(['prefix' => 'Staff', 'middleware' => 'staff'], function () {
		Route::get('Home', 'Staff\HomeController@index');
    Route::group(['prefix' => 'Pesanan'], function () {
      Route::get('DaftarPesanan', 'Staff\PesananController@index');
      Route::get('TambahPesanan', 'Staff\PesananController@tambahpesanan_biodata');
      Route::post('TambahPesanan', 'Staff\PesananController@get_tambahpesanan_biodata');
      Route::get('LihatPesanan/{id}', 'Staff\PesananController@detil_pesanan');
      Route::get('UbahPesanan/{id}', 'Staff\PesananController@ubah_pesanan');
      Route::post('UbahPesanan/{id}', 'Staff\PesananController@get_ubah_pesanan');
      Route::post('UbahStatusPesanan/{id}', 'Staff\PesananController@ubah_status_pesanan');
      Route::get('HapusPesanan/{id}', 'Staff\PesananController@hapus_pesanan');
      Route::get('KirimEmail/{id}', 'Staff\PesananController@kirim_email_pesanan');
    });
    Route::get('PengaturanAkun', 'Staff\PengaturanAkunController@update');
    Route::post('PengaturanAkun', 'Staff\PengaturanAkunController@updatedata');
	});
});