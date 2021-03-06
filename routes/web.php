<?php

use App\Http\Controllers\PenilaianController;
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
    return redirect('/home-periode'); 
});



Route::get('/login/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');
Route::get('/home/tenaga-teknis/{id}','HomeController@index');
Route::get('/home-periode','HomeController@home_periode');
Route::get('/penilaian-tenaga-teknis/detail-penilaian/{id}/{id_periode}', 'PenilaianController@detail_penilaian');

Route::group(['middleware' => ['auth','checkRole:admin,superadmin']],function(){

	// tenaga teknis
	Route::get('/tenaga_teknis', 'TenagaTeknisController@tenaga_teknis');
	Route::get('/tambah-tenaga-teknis', 'TenagaTeknisController@tambah_tenaga_teknis');
	Route::post('/post-tenaga-teknis', 'TenagaTeknisController@post_tenaga_teknis');
	Route::post('/post-ubah-tenaga-teknis', 'TenagaTeknisController@post_ubah_tenaga_teknis');
	Route::get('/hapus-tenaga-teknis/{id}', 'TenagaTeknisController@hapus_tenaga_teknis');
	Route::get('/ubah-tenaga-teknis/{id}', 'TenagaTeknisController@ubah_tenaga_teknis');

	// wilayah
	Route::get('/wilayah', 'WilayahController@wilayah');
	Route::get('/tambah-wilayah', 'WilayahController@tambah_wilayah');
	Route::post('/post-wilayah', 'WilayahController@post_wilayah');
	Route::post('/post-ubah-wilayah', 'WilayahController@post_ubah_wilayah');
	Route::get('/hapus-wilayah/{id}', 'WilayahController@hapus_wilayah');
	Route::get('/ubah-wilayah/{id}', 'WilayahController@ubah_wilayah');

	// kantor
	Route::get('/kantor', 'KantorController@kantor');
	Route::get('/tambah-kantor', 'KantorController@tambah_kantor');
	Route::post('/post-kantor', 'KantorController@post_kantor');
	Route::get('/hapus-kantor/{id}', 'KantorController@hapus_kantor');

	
	Route::get('/print-tenaga-teknis-home', 'HomeController@print_home');
	Route::get('/home/exportskpd','HomeController@exportskpd');

	// variabel penilaian
	Route::get('/variabel-penilaian', 'VariabelPenilaianController@variabel_penilaian');
	Route::get('/tambah-variabel-penilaian', 'VariabelPenilaianController@tambah_variabel_penilaian');
	Route::post('/post-variabel-penilaian', 'VariabelPenilaianController@post_variabel_penilaian');
	Route::get('/hapus-variabel-penilaian/{id}', 'VariabelPenilaianController@hapus_variabel_penilaian');
	Route::get('/ubah-variabel-penilaian/{id}', 'VariabelPenilaianController@ubah_variabel_penilaian');
	Route::post('/post-ubah-variabel-penilaian/{id}', 'VariabelPenilaianController@post_ubah_variabel_penilaian');

	// penilaian
	Route::get('/penilaian/periode/{id}', 'PenilaianController@periode');
	Route::get('/penilaian/kantor', 'PenilaianController@kantor');
	Route::get('/penilaian/tenaga-teknis/{id_kantor}/{id_periode}', 'PenilaianController@tenaga_teknis');
	Route::get('/penilaian-tenaga-teknis/{id_tenaga_teknis}/{id_periode}', 'PenilaianController@penilaian');
	Route::post('/post_penilaian/{id}/{id_periode}', 'PenilaianController@post_penilaian');
	Route::get('/print-data-tenaga-teknis/{id}', 'PenilaianController@print_tenaga_teknis');
	

	// pengguna
	Route::get('/pengguna', 'UserController@user');
	Route::get('/user/tambah', 'UserController@tambah');
	Route::get('/user/{id}/delete', 'UserController@delete');
	Route::post('/user/create', 'UserController@create');

	// 
	Route::get('/parameter-penilaian/{id}', 'PenilaianController@parameter_penilaian');
	Route::get('/tambah-parameter-penilaian/{id}', 'PenilaianController@tambah_parameter_penilaian');
	Route::get('/hapus-parameter-penilaian/{id}', 'PenilaianController@hapus_parameter_penilaian');
	Route::get('/ubah-parameter-penilaian/{id}', 'PenilaianController@ubah_parameter_penilaian');
	Route::post('/post-parameter-penilaian/{id}', 'PenilaianController@post_parameter_penilaian');
	Route::post('/post-ubah-parameter-penilaian/{id}', 'PenilaianController@post_ubah_parameter_penilaian');

	Route::get('/periode', 'PeriodeController@periode');
	Route::get('/periode/edit/{id}', 'PeriodeController@edit');
	Route::get('/periode/tambah', 'PeriodeController@create');
	Route::post('/periode/create', 'PeriodeController@create_post');
	Route::post('/periode/post-edit', 'PeriodeController@post_edit');
});

