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


Route::get('/admin/team', 'TeamsController@team');
Route::get('/admin/team/softdelete', 'TeamsController@softdelete');
Route::get('/admin/team/create', 'TeamsController@teamcreateview');
Route::get('/admin/team/restore/{team}', 'TeamsController@teamrestore');
Route::get('/admin/team/update/{team}', 'TeamsController@teamupdateview');
Route::get('/admin/team/{team}', 'TeamsController@teambyid');
Route::post('/admin/team', 'TeamsController@teamcreate');
Route::patch('/admin/team/{team}', 'TeamsController@teamupdate');
Route::delete('/admin/team/{team}', 'TeamsController@teamdelete');

Route::get('/admin/player', 'PlayersController@player');
Route::get('/admin/player/create', 'PlayersController@playercreateview');
Route::get('/admin/player/update/{player}', 'PlayersController@playerupdateview');
Route::get('/admin/player/{player}', 'PlayersController@playerbyid');
Route::get('/admin/player/restore/{player}', 'PlayersController@playerrestore');
Route::post('/admin/player', 'PlayersController@playercreate');
Route::patch('/admin/player/{player}', 'PlayersController@playerupdate');
Route::delete('/admin/player/{player}', 'PlayersController@playerdelete');

Route::get('/admin/schedule', 'SchedulesController@schedule');
Route::get('/admin/schedule/softdelete', 'SchedulesController@softdelete');
Route::get('/admin/schedule/create', 'SchedulesController@schedulecreateview');
Route::get('/admin/schedule/update/{schedule}', 'SchedulesController@scheduleupdateview');
Route::get('/admin/schedule/restore/{schedule}', 'SchedulesController@schedulerestore');
Route::get('/admin/schedule/{schedule}', 'SchedulesController@schedulebyid');
Route::post('/admin/schedule', 'SchedulesController@schedulecreate');
Route::patch('/admin/schedule/{schedule}', 'SchedulesController@scheduleupdate');
Route::delete('/admin/schedule/{schedule}', 'SchedulesController@scheduledelete');