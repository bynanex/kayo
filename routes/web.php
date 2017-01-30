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
	return view('index', [
		'projects' => App\Project::paginate(env('PAGINATION_MAX_PROJECTS'))
	]);
});

Route::get('/u/{user}', 'UserController@profile')->name('profile');

Route::get('/{project}', 'ProjectController@overview')->name('overview');
Route::get('/{project}/maintainers', 'ProjectController@maintainers')->name('overview');

Route::get('/{project}/media', 'ProjectController@media')->name('media');
Route::get('/{project}/releases', 'ProjectController@releases')->name('releases');
Route::get('/{project}/wiki/{page?}', 'ProjectController@wiki')->name('wiki');

Route::get('/{project}/releases/{release}/{file}/download', 'ReleaseController@download');
Route::get('/{project}/releases/{release}/{file}/signature', 'ReleaseController@signature');

Route::get('/{project}/media/{media}', 'MediaController@view')->name('media');
Route::get('/{project}/media/{media}/download', 'MediaController@download');