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
Route::post('/admin/team', 'AdminsController@teamcreate');


Route::get('/admin/player', 'AdminsController@player');
Route::get('/admin/player/create', 'AdminsController@playercreateview');
Route::post('/admin/player', 'AdminsController@playercreate');

Route::get('/admin/schedule', 'AdminsController@schedule');
Route::get('/admin/schedule/create', 'AdminsController@schedulecreateview');
Route::post('/admin/schedule', 'AdminsController@schedulecreate');