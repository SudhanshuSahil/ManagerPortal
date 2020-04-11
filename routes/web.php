<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', 'PagesController@home');
Route::get('/not-home', 'PagesController@not_home');
Route::get('/home', 'PagesController@home');

Route::resource('events', 'EventsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
