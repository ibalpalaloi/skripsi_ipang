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

Route::group(['middleware' => ['auth','checkRole:admin,superadmin']],function(){

	// tenaga teknis
	Route::get('/tenaga_teknis', 'TenagaTeknisController@tenaga_teknis');
	Route::get('/tambah-tenaga-teknis', 'TenagaTeknisController@tambah_tenaga_teknis');
	Route::post('/post-tenaga-teknis', 'TenagaTeknisController@post_tenaga_teknis');
	Route::get('/hapus-tenaga-teknis/{id}', 'TenagaTeknisController@hapus_tenaga_teknis');

	// wilayah
	Route::get('/wilayah', 'WilayahController@wilayah');
	Route::get('/tambah-wilayah', 'WilayahController@tambah_wilayah');
	Route::post('/post-wilayah', 'WilayahController@post_wilayah');
	Route::get('/hapus-wilayah/{id}', 'WilayahController@hapus_wilayah');

	// kantor
	Route::get('/kantor', 'KantorController@kantor');
	Route::get('/tambah-kantor', 'KantorController@tambah_kantor');
	Route::post('/post-kantor', 'KantorController@post_kantor');
	Route::get('/hapus-kantor/{id}', 'KantorController@hapus_kantor');

	Route::get('/home','HomeController@index');
	Route::get('/home/exportskpd','HomeController@exportskpd');

	// variabel penilaian
	Route::get('/variabel-penilaian', 'VariabelPenilaianController@variabel_penilaian');
	Route::get('/tambah-variabel-penilaian', 'VariabelPenilaianController@tambah_variabel_penilaian');
	Route::post('/post-variabel-penilaian', 'VariabelPenilaianController@post_variabel_penilaian');
	Route::get('/hapus-variabel-penilaian/{id}', 'VariabelPenilaianController@hapus_variabel_penilaian');
	Route::get('/ubah-variabel-penilaian/{id}', 'VariabelPenilaianController@ubah_variabel_penilaian');
	Route::post('/post-ubah-variabel-penilaian/{id}', 'VariabelPenilaianController@post_ubah_variabel_penilaian');


	// penilaian
	Route::get('/penilaian/kantor', 'PenilaianController@kantor');
	Route::get('/penilaian/tenaga-teknis/{id}', 'PenilaianController@tenaga_teknis');
	Route::get('/penilaian-tenaga-teknis/{id}', 'PenilaianController@penilaian');
	Route::post('/post_penilaian/{id}', 'PenilaianController@post_penilaian');
	Route::get('/print-data-tenaga-teknis/{id}', 'PenilaianController@print_tenaga_teknis');

	// pengguna
	Route::get('/pengguna', 'UserController@user');
	Route::get('/user/tambah', 'UserController@tambah');
	Route::get('/user/{id}/delete', 'UserController@delete');
	Route::post('/user/create', 'UserController@create');
});

