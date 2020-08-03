<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('semua_berkas','api\BerkasController@index');
Route::post('aktivasi','api\WarisController@aktivasi');
Route::post('berkas','api\BerkasController@berkas')->middleware('auth:api_waris');
Route::post('pdf','api\BerkasController@cetak_pdf');



Route::group(['prefix' => 'waris'], function () {
    Route::post('register', 'api\auth\AuthWaris\RegisterController@register');
    Route::post('login', 'api\auth\AuthWaris\LoginController@login');
    Route::get('me','api\WarisController@me')->middleware('auth:api_waris');
    Route::get('tracking','api\WarisController@tracking' )->middleware('auth:api_waris');
    Route::post('update','api\WarisController@update' )->middleware('auth:api_waris');
    Route::post('survey','api\SurveyController@create')->middleware('auth:api_waris');
    Route::get('grafik','api\BerkasController@grafik');
});


Route::group(['prefix' => 'petugas'], function () {
    Route::post('login', 'api\auth\AuthPetugas\LoginController@login');
    Route::get('profile', 'api\PetugasController@profile')->middleware('auth:api_petugas');
    Route::get('search', 'api\PetugasController@search')->middleware('auth:api_petugas');
    Route::post('update', 'api\PetugasController@update')->middleware('auth:api_petugas');
    Route::get('berkasBaru', 'api\BerkasController@dataMasuk')->middleware('auth:api_petugas');
    Route::get('dataconfirmedII','api\BerkasController@dataConfirmedII')->middleware('auth:api_petugas');
    Route::get('dataConfirmedIII','api\BerkasController@dataConfirmedIII')->middleware('auth:api_petugas');
    Route::post('berkas/{data}', 'api\BerkasController@confirmed_I')->middleware('auth:api_petugas');
    Route::post('acc/{data}', 'api\BerkasController@confirmed_III')->middleware('auth:api_petugas');
    Route::get('listsurvey', 'api\SurveyController@index');
});

Route::group(['prefix' => 'dinkes'], function () {
    Route::post('login', 'api\auth\AuthDinkes\LoginController@login');
    Route::get('profile', 'api\DinkesController@profile')->middleware('auth:api_dinkes');
    Route::post('update', 'api\DinkesController@update')->middleware('auth:api_dinkes');
    Route::get('dataconfirmedII','api\BerkasController@dataConfirmedII')->middleware('auth:api_dinkes');
    Route::get('dataconfirmedI','api\BerkasController@dataConfirmedI')->middleware('auth:api_dinkes');
    Route::post('berkas/{data}', 'api\BerkasController@confirmed_II')->middleware('auth:api_dinkes');
});

Route::group(['prefix' => 'bakuda'], function () {
    Route::post('login', 'api\auth\AuthBakuda\LoginController@login');  
    Route::post('filter', 'api\BerkasController@filter')->middleware('auth:api_bakuda');
    Route::get('datavalid','api\BerkasController@dataConfirmedIII')->middleware('auth:api_bakuda');
    Route::post('update', 'api\BakudaController@update')->middleware('auth:api_bakuda');
    Route::post('berkas/{data}', 'api\BerkasController@confirmed_IV')->middleware('auth:api_bakuda');
    Route::get('dana_cair','api\BerkasController@dataConfirmedIV')->middleware('auth:api_bakuda');
    Route::POST('report','api\BerkasController@pdf')->middleware('auth:api_bakuda');
    Route::get('profile', 'api\BakudaController@profile')->middleware('auth:api_bakuda');
});
