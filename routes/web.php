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
	return view('index');
});

Route::get('/{project}', 'ProjectController@view')->name('overview');
Route::get('/{project}/releases', 'ProjectController@releases')->name('releases');

Route::get('/{project}/releases/{release}/{file}/download', 'ReleaseController@download');
Route::get('/{project}/releases/{release}/{file}/signature', 'ReleaseController@signature');