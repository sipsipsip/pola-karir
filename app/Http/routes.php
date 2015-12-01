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





Route::get('app', ['uses'=>'AppController@home']);

Route::get('login_dengan_id/{id}', function($id){
    \Auth::logout();
    \Auth::loginUsingId($id);
    return view('app/root');
});







// Api v1
Route::group(['prefix'=>'api/v1'], function(){

    Route::get('pegawai', ['uses'=>'PegawaiController@index']); //done
    Route::get('pegawai/{id}', ['uses'=>'PegawaiController@show']); // done
    Route::get('pegawai/{id}/rencana-karir', ['uses'=>'PegawaiController@showRencanaKarir']); // done
    Route::post('pegawai/{id}/rencana-karir', ['uses'=>'PegawaiController@addRencanaKarir']); // done
    Route::post('pegawai/{id}/rencana-karir/edit', ['uses'=>'PegawaiController@editRencanaKarir']); // done
    Route::post('pegawai/{id}/manajer', ['uses'=>'PegawaiController@assignManajer']); // done


    Route::get('rencana-karir/{id}', ['uses'=>'RencanaKarirController@show']); // done
    Route::get('rencana-karir/{id}/komentar', ['uses'=>'RencanaKarirController@showKomentar']); // done
    Route::post('rencana-karir/{id}/komentar', ['uses'=>'RencanaKarirController@addKomentar']); // done
    Route::get('rencana-karir/{year}/stats', ['uses'=>'RencanaKarirController@showStats']); // last
    Route::post('rencana-karir/{id}/approve', ['uses'=>'RencanaKarirController@approve']); // done
    Route::post('rencana-karir/{id}/reject', ['uses'=>'RencanaKarirController@reject']); // done


    Route::get('penawaran/{year}', ['uses'=>'PenawaranController@index']); // done
    Route::get('penawaran/{year}/stats', ['uses'=>'PenawaranController@showStats']); // last
    Route::post('penawaran/{id}/mendaftar', ['uses'=>'PenawaranController@mendaftar']); // done


    Route::get('manajer/{id}/rencana-karir/{year}', ['uses'=>'ManajerController@showRencanaKarir']); // done

    Route::get('diklat', ['uses'=>'DiklatController@index']); // done

    Route::get('perbantuan', ['uses'=>'PerbantuanController@index']); // done

    Route::get('export-excel/rencana-karir/{year}', ['uses'=>'ExportController@rekapRencanaKarir']);
    Route::get('export-excel/penawaran/{year}', ['uses'=>'PenawaranController@rekapPenawaran']);



    Route::get('options-value/diklat', ['uses'=>'DiklatController@optionsValue']);
    Route::get('options-value/perbantuan', ['uses'=>'PerbantuanController@optionsValue']);
    Route::get('options-value/jabatan', ['uses'=>'JabatanController@optionsValue']);
    Route::get('options-value/pegawai', ['uses'=>'PegawaiController@optionsValue']);


});


// TODO: kemarin lagi nyelesain logic di Controller. Tinggal dikit lagi. Lihat progress id file ini. (routes.php)
