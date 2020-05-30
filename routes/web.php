<?php

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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminsController@home');


Route::get('/admin/team', 'AdminsController@team');
Route::get('/admin/team/create', 'AdminsController@teamcreateview');
Route::get('/admin/team/update/{team}', 'AdminsController@teamupdateview');
Route::get('/admin/team/{team}', 'AdminsController@teambyid');
Route::post('/admin/team', 'AdminsController@teamcreate');
Route::patch('/admin/team/{team}', 'AdminsController@teamupdate');
Route::delete('/admin/team/{team}', 'AdminsController@teamdelete');


Route::get('/admin/player', 'AdminsController@player');
Route::get('/admin/player/create', 'AdminsController@playercreateview');
Route::get('/admin/player/update/{player}', 'AdminsController@playerupdateview');
Route::get('/admin/player/{player}', 'AdminsController@playerbyid');
Route::post('/admin/player', 'AdminsController@playercreate');
Route::patch('/admin/player/{player}', 'AdminsController@playerupdate');
Route::delete('/admin/player/{player}', 'AdminsController@playerdelete');

Route::get('/admin/schedule', 'AdminsController@schedule');
Route::get('/admin/schedule/{schedules}', 'AdminsController@schedulebyid');
Route::get('/admin/schedule/create', 'AdminsController@schedulecreateview');
Route::post('/admin/schedule', 'AdminsController@schedulecreate');