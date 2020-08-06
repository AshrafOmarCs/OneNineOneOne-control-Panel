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
Route::get('statstaic','adminController@index');

Route::get('Dashboard','adminController@Dashboard');

Route::get('usersList','adminController@usersList');

Route::get('CreateUser','adminController@CreateUser');
Route::get('Delete/users/{id}','adminController@DeleteUser');
Route::get('userDetails/{id}','adminController@userDetails');
Route::post('user/create','adminController@storeUser');
Route::get('userEdite/{id}','adminController@userEdite');
Route::post('updateUser/{id}','adminController@updateUser');
Route::get('dept/list','settingController@list');
Route::get('dept/create','settingController@create');
Route::get('compy/list','settingController@complain');
Route::get('compy/add','settingController@complainCreate');
Route::post('compy/store','settingController@storeCompy');
Route::post('dept/store','settingController@storeDept');

Route::get('complain/list','complainContrller@list');
Route::get('complain/show','complainContrller@show');
