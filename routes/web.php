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

Route::get('/','LoginController@index')->name('login');
Route::post('/login','LoginController@auth')->name('auth');
Route::get('/logout','LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/portal','PortalController@index')->name('portal');
    Route::get('/profile','ProfileController@index')->name('profile');

    //Route untuk Profile
    Route::post('/profile/update/{id}','ProfileController@update')->name('profile.update');


    //Route untuk Hak Akses
    Route::get('/akses','AksesController@index')->name('akses');
    Route::get('/akses/create','AksesController@create')->name('akses.create');
    Route::post('/akses/store','AksesController@store')->name('akses.store');
    Route::get('/akses/edit/{id}','AksesController@edit')->name('akses.edit');
    Route::post('/akses/update/{id}','AksesController@update')->name('akses.update');
    Route::get('/akses/delete/{id}','AksesController@delete')->name('akses.delete');

    //Route untuk Kinerja
    Route::get('/kinerja','KinerjaController@index')->name('kinerja');
    Route::get('/kinerja/create','KinerjaController@create')->name('kinerja.create');
    Route::post('/kinerja/store','KinerjaController@store')->name('kinerja.store');
    Route::get('/kinerja/edit/{id}','KinerjaController@edit')->name('kinerja.edit');
    Route::post('/kinerja/update/{id}','KinerjaController@update')->name('kinerja.update');
    Route::get('/kinerja/delete/{id}','KinerjaController@delete')->name('kinerja.delete');

    //Route untuk indiKator
    Route::get('/indicator','IndicatorController@index')->name('indicator');
    Route::get('/indicator/create','IndicatorController@create')->name('indicator.create');
    Route::post('/indicator/store','IndicatorController@store')->name('indicator.store');
    Route::get('/indicator/edit/{id}','IndicatorController@edit')->name('indicator.edit');
    Route::post('/indicator/update/{id}','IndicatorController@update')->name('indicator.update');
    Route::get('/indicator/delete/{id}','IndicatorController@delete')->name('indicator.delete');

     //Route untuk Kinerja skpd
     Route::get('/kinerja_skpd','KinerjaSKPDController@index')->name('kinerja_skpd');
     Route::get('/kinerja_skpd/create','KinerjaSKPDController@create')->name('kinerja_skpd.create');
     Route::post('/kinerja_skpd/store','KinerjaSKPDController@store')->name('kinerja_skpd.store');
     Route::get('/kinerja_skpd/edit/{id}','KinerjaSKPDController@edit')->name('kinerja_skpd.edit');
     Route::post('/kinerja_skpd/update/{id}','KinerjaSKPDController@update')->name('kinerja_skpd.update');
     Route::get('/kinerja_skpd/delete/{id}','KinerjaSKPDController@delete')->name('kinerja_skpd.delete');
 

    //Route untuk targetbidang
    Route::get('/targetbid','TargetbidController@index')->name('targetbid');
    Route::get('/targetbid/create','TargetbidController@create')->name('targetbid.create');
    Route::post('targetbid/generate','TargetbidController@generate')->name('targetbid.generate');
    Route::get('/targetbid/entrybid/{id}','TargetbidController@entrybid')->name('targetbid.entrybid');
    Route::post('targetbid/store','TargetbidController@store')->name('targetbid.store');
    Route::get('targetbid/edit/{id}','TargetbidController@edit')->name('targetbid.edit');
    Route::post('targetbid/update/{id}','TargetbidController@update')->name('targetbid.update');
    Route::get('targetbid/editmeta/{id}','TargetbidController@editmeta')->name('targetbid.editmeta');
    Route::post('targetbid/updatemeta/{id}','TargetbidController@updatemeta')->name('targetbid.updatemeta');
    Route::get('targetbid/delete/{id}','TargetbidController@delete')->name('targetbid.delete');
  
    //Route untuk target sub bidang
    Route::get('/targetsubbid','TargetsubbidController@index')->name('targetsubbid');
    Route::get('/targetsubbid/create','TargetsubbidController@create')->name('targetsubbid.create');
    Route::post('targetsubbid/generate','TargetsubbidController@generate')->name('targetsubbid.generate');
    Route::get('/targetsubbid/entrybid/{id}','TargetsubbidController@entrybid')->name('targetsubbid.entrybid');
    Route::post('targetsubbid/store','TargetsubbidController@store')->name('targetsubbid.store');
    Route::get('targetsubbid/edit/{id}','TargetsubbidController@edit')->name('targetsubbid.edit');
    Route::post('targetsubbid/update/{id}','TargetsubbidController@update')->name('targetsubbid.update');
    Route::get('targetsubbid/editmeta/{id}','TargetsubbidController@editmeta')->name('targetsubbid.editmeta');
    Route::post('targetsubbid/updatemeta/{id}','TargetsubbidController@updatemeta')->name('targetsubbid.updatemeta');
    Route::get('targetsubbid/delete/{id}','TargetsubbidController@delete')->name('targetsubbid.delete');

   //Route untuk Realisasi Sub Bidang
    Route::get('/realsubbid','RealsubbidController@index')->name('realsubbid');
    Route::get('/realsubbid/create','RealsubbidController@create')->name('realsubbid.create');
    Route::post('realsubbid/generate','RealsubbidController@generate')->name('realsubbid.generate');
    Route::get('/realsubbid/entrydata/{id}','RealsubbidController@entrydata')->name('realsubbid.entrydata');
    Route::post('realsubbid/store','RealsubbidController@store')->name('realsubbid.store');
    Route::get('realsubbid/edit/{id}','RealsubbidController@edit')->name('realsubbid.edit');
    Route::post('realsubbid/update/{id}','RealsubbidController@update')->name('realsubbid.update');
    Route::get('realsubbid/editmeta/{id}','RealsubbidController@editmeta')->name('realsubbid.editmeta');
    Route::post('realsubbid/updatemeta/{id}','RealsubbidController@updatemeta')->name('realsubbid.updatemeta');
    Route::get('realsubbid/getrenstra','RealsubbidController@getrenstra')->name('realsubbid.getrenstra');

    //Route untuk Verifikasi Sub Bidang
    Route::get('/verisubbid','VerisubbidController@index')->name('verisubbid');
    Route::get('verisubbid/verifikasi/{id}','VerisubbidController@edit')->name('verisubbid.verifikasi');
    Route::post('verisubbid/update/{id}','VerisubbidController@update')->name('verisubbid.update');


});


