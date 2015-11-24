<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

// Login LDAP
Route::get('auth/ldap', 'Auth\LDAPController@getLogin');
Route::post('auth/ldap', 'Auth\LDAPController@postLogin');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// Api v1
Route::group(['prefix'=>'api/v1'], function(){

    Route::get('pegawai/{id}/rencana-karir/{year}', ['uses'=>'PegawaiController@showRencanaKarir']);
    Route::post('pegawai/{id}/rencana-karir', ['uses'=>'PegawaiController@addRencanaKarir']);
    Route::get('pegawai', ['uses'=>'PegawaiController@index']);
    Route::post('pegawai/{id}/manajer', ['uses'=>'PegawaiController@assignManajer']);


    Route::get('rencana-karir/{id}', ['uses'=>'RencanaKarirController@show']);
    Route::get('rencana-karir/{id}/komentar', ['uses'=>'RencanaKarirController@showKomentar']);
    Route::post('rencana-karir/{id}/komentar', ['uses'=>'RencanaKarirController@addKomentar']);
    Route::post('rencana-karir/{id}/approve', ['RencanaKarirController@approve']);
    Route::post('rencana-karir/{id}/reject', ['RencanaKarirController@reject']);
    Route::get('rencana-karir/{year}/stats', ['uses'=>'RencanaKarirController@showStats']);


    Route::get('penawaran/{year}', ['uses'=>'PenawaranController@index']);
    Route::post('penawaran/{id}/mendaftar', ['uses'=>'PenawaranController@mendaftar']);
    Route::get('penawaran/{year}/stats', ['uses'=>'PenawaranController@showStats']);
    Route::get('penawaran', ['uses'=>'PenawaranController@index']);

    Route::get('manajer/{id}/rencana-karir/{year}', ['ManajerController@showRencanaKarir']);

    Route::get('diklat', ['uses'=>'DiklatController@index']);

    Route::get('perbantuan', ['uses'=>'PerbantuanController@index']);

    Route::get('export-excel/rencana-karir/{year}', ['uses'=>'ExportController@rekapRencanaKarir']);
    Route::get('export-excel/penawaran/{year}', ['uses'=>'PenawaranController@rekapPenawaran']);

});