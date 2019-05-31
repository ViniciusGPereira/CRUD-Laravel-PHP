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

Route::get('/', 'HomeController@lista');
Route::post('/', 'HomeController@add');
Route::get('/del/{id}', 'HomeController@delete');
Route::post('/update', 'HomeController@update');
