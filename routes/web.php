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
    return redirect('login');
});
//ketika ada yang redirect ke registrasi maka akan diarahkan ke login

Route::match(['get','post'],'/register',function(){
    return redirect('login');
});

Route::post('report', 'api\BerkasController@pdf');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
//petugas
Route::resource('petugas', 'PetugasController')->except(['show']);
Route::get('petugas/{petugas}','PetugasController@reset')->name('petugas.reset');
//dinkes
Route::resource('dinkes', 'DinkesController')->except(['show']);
Route::get('dinkes/{dinkes}','DinkesController@reset')->name('dinkes.reset');
//bakuda
Route::resource('bakuda', 'BakudaController')->except(['show']);
Route::get('Bakuda/{bakuda}','BakudaController@reset')->name('bakuda.reset');
//aktivitas
Route::resource('aktivitas','AktivitasController');
//report_berkas
Route::get('report_data', 'BerkasController@index')->name('report_data');
//pdf
Route::get('cetak_pdf','BerkasController@cetak_pdf')->name('cetak_pdf');
});