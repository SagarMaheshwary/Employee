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

/**
 * Dashboard Route(s)
 * 
 */
Route::get('/','DashBoardController@index')->name('home');

/**
 *  Departments Route(s)
 * 
 */
Route::resource('/departments','DepartmentsController');