<?php

use Illuminate\Support\Facades\Route;
use App\Hash;
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
Route::get('statstaic','adminController@index')->middleware('auth');
Route::get('/home','adminController@Dashboard')->middleware('auth');
Route::get('usersList','adminController@usersList');
Route::get('CreateUser','adminController@CreateUser')->middleware('auth');
Route::get('Delete/users/{id}','adminController@DeleteUser')->middleware('auth');
Route::get('userDetails/{id}','adminController@userDetails')->middleware('auth');
Route::post('user/create','adminController@storeUser')->middleware('auth');
Route::get('userEdite/{id}','adminController@userEdite')->middleware('auth');
Route::post('updateUser/{id}','adminController@updateUser')->middleware('auth');
Route::get('dept/list','settingController@list')->middleware('auth');
Route::get('dept/create','settingController@create')->middleware('auth');
Route::get('compy/list','settingController@complain')->middleware('auth');
Route::get('compy/add','settingController@complainCreate')->middleware('auth');
Route::post('compy/store','settingController@storeCompy')->middleware('auth');
Route::post('dept/store','settingController@storeDept')->middleware('auth');
Route::get('complain/list','complainContrller@list')->middleware('auth');
Route::get('complain/show/{id}','complainContrller@show')->middleware('auth');
Route::get('complain/delete/{id}','complainContrller@delete')->middleware('auth');
Route::get('complain/filter','complainContrller@filter')->middleware('auth');
Route::post('complain/Checking','complainContrller@checking')->middleware('auth');
Route::post('complain/assighnTo/{id}','complainContrller@assighnTo')->middleware('auth');
Route::get('dept/update/{id}','settingController@edite_dept')->middleware('auth');
Route::post('dept/update/{id}','settingController@dept_update')->middleware('auth');
Route::post('complain/update/{id}','complainContrller@updateStore')->middleware('auth');


Route::get('compalin/update/{id}','complainContrller@UpdateComCat')->middleware('auth');
Route::get('/','adminController@login');

Route::post('loginAdmin','adminController@loginAdmin')->middleware('auth');
 
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
