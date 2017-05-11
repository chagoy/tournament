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
    return view('welcome');
});
Route::get('/logout', function(){
	Auth::logout();
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/boxers', 'BoxerController@index');
Route::get('/boxers/{boxer}', 'BoxerController@show');
Route::get('/boxers/by/{category}', 'BoxerController@category');

Route::get('/add', 'BoxerController@create');
Route::post('/add', 'BoxerController@store');
Route::get('/tournament', 'TournamentController@index');
Route::get('/tournament/create/{weight}', 'TournamentController@show');
Route::post('/tournament/create/store', 'TournamentController@store');
Route::get('/1v1', 'FightController@index');
Route::get('/1v1/create/{weight}', 'FightController@show');