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
Route::get('/dashboard','DashBoardController@index')->name('dashboard');

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
Route::get('/cities/search/{str}','CitiesController@search');

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

/**
 *  Admins Route(s)
 */
Route::resource('/admins','AdminsController');

/**
 *  Auth Route(s)
 */

//show the login view
Route::get('/','AuthController@index')->name('login');

//Authenticate a user
Route::post('/','AuthController@authenticate')->name('auth.authenticate');

//logout the user
Route::get('/logout','AuthController@logout')->name('auth.logout')->middleware('auth');

//show user details
Route::get('/admin','AuthController@show')->name('auth.show')->middleware('auth');

//Show Password Reset Form
Route::get('/password/reset', 'AuthController@showpasswordresetform')->name('auth.reset');

//Reset Password
Route::post('/password/reset', 'AuthController@reset');