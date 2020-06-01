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
    if(Auth::user())
        return redirect(route('home'));
    else
        return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profile','ProfileController');





Route::group(['middleware'=>'auth'],function(){


    Route::resource('user','Monitoring\UserController');

    Route::post('/getdropdown','Monitoring\UserController@getdropdown');
    Route::post('/getdropdown','Monitoring\DataMarkerController@getdropdown');

    Route::get('/laporan_export',[
        'as' => 'export_excel.laporan',
        'uses' => 'Monitoring\DataMarkerController@indexExport'
    ]);

    Route::resource('data_marker','Monitoring\DataMarkerController');
    Route::resource('gis','GisController');

    Route::get('/list_data_marker', [
        'as' => 'listdata',
        'uses'=>'Monitoring\DataMarkerController@indexDataMarker'
    ]);

    Route::get('/list_data_marker/edit/{data_id}', [
        'as' => 'listdata.edit2',
        'uses'=>'Monitoring\DataMarkerController@edit2'
    ]);

    Route::post('/list_data_marker/update/{data_id}', [
        'as' => 'listdata.update2',
        'uses'=>'Monitoring\DataMarkerController@update2'
    ]);


    Route::post('/maps_pati', [
        'as' => 'carto',
        'uses'=>'Monitoring\DataMarkerController@indexCarto'
    ]);


    Route::get('/home/json', [
        'as' => 'home.json',
        'uses'=>'HomeController@json'
    ]);

    Route::get('/home/json2', [
        'as' => 'home.json2',
        'uses'=>'HomeController@json2'
    ]);

    Route::get('/home/json3', [
        'as' => 'home.json3',
        'uses'=>'HomeController@json3'
    ]);


    Route::get('/upload', 'GisController@upload');
    Route::post('/upload/proses', 'GisController@proses_upload');   

});
