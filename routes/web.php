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
 *  you can see the list of all the routes with all details by typing,
 *  php artisan route:list on the commandline. also change your directory to 
 *  this project directory when doing so.
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

/**
 *  Countries Route(s)
 */
Route::resource('/countries','CountriesController');

/**
 *  Cities Route(s)
 */
Route::resource('/cities','CitiesController');

/**
 *  Salaries Route(s)
 */
Route::resource('/salaries','SalariesController');

/**
 *  Divisions Route(s)
 */
Route::resource('/divisions','DivisionsController');

/**
 *  States Route(s)
 */
Route::resource('/states','StatesController');

/**
 *  States Route(s)
 */
Route::resource('/employees','EmployeesController');