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

Route::get('/', function () {
    return view('auths.login'); 
});



Route::get('/login/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

// Route::group(['middleware' => ['auth','checkRole:Admin,Pegawai']],function(){

	Route::get('/home','HomeController@index');
	Route::get('/home/exportskpd','HomeController@exportskpd');

	Route::get('/skpd','SkpdController@skpd');
	Route::get('/skpd/{id_skpd}/edit','SkpdController@edit');
	Route::get('/skpd/{id_skpd}/delete','SkpdController@delete');
	Route::post('/skpd/ubah/{id}','SkpdController@ubah');
	Route::get('/skpd/tambah','SkpdController@tambah');
	Route::post('/skpd/create','SkpdController@create');

	Route::get('/produk','ProdukController@produk');
	Route::post('/produk/create','ProdukController@create');
	Route::get('/produk/{id_produk}/edit','ProdukController@edit');
	Route::get('/produk/{id_produk}/delete','ProdukController@delete');
	Route::post('/produk/ubah/{id}','ProdukController@ubah');
	Route::get('/produk/tambah','ProdukController@tambah');

	Route::get('/penilai','PenilaiController@penilai');
	Route::post('/penilai/create','PenilaiController@create');
	Route::get('/penilai/{id_penilai}/edit','PenilaiController@edit');
	Route::get('/penilai/{id_penilai}/delete','PenilaiController@delete');
	Route::post('/penilai/ubah/{id}','PenilaiController@ubah');
	Route::get('/penilai/tambah','PenilaiController@tambah');

	Route::get('/penilaian','PenilaianController@penilaian');
	Route::post('/nilai', 'PenilaianController@nilai');
	Route::get('/hasil', 'PenilaianController@hasil');
	Route::get('/layanan/{id}', 'PenilaianController@layanan');
	Route::get('/layanan/{id}/detail', 'PenilaianController@detail');
	Route::get('/layanan/{id}/delete', 'PenilaianController@layanan');
	Route::post('/get_produk_penilaian', 'PenilaianController@get_produk')->name('get.produk.penilaian');

	Route::get('/user','UserController@user');
	Route::post('/user/create','UserController@create');
	Route::get('/user/{id}/edit','UserController@edit');
	Route::get('/user/{id}/delete','UserController@delete');
	Route::post('/user/{id}/ubah','UserController@ubah');
	Route::get('/user/tambah','UserController@tambah');
// });

