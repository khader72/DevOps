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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index');
Route::get('/homeSupervision', 'HomeController@ShowHome');
Route::get('/recherche', 'HomeController@ShowSearch');
Route::get('/host', 'HostController@ShowHost');
Route::get('/grouphost', 'GroupHostController@ShowGroupHost');
Route::get('/service', 'ServiceController@ShowService');
Route::get('/equipement', 'EquipementController@ShowEquipement');
Route::get('/getEquipementAll', 'EquipementController@getEquipementAll');
Route::get('/login', 'LoginController@ShowLogin');
Route::get('/user', 'UserController@ShowUser');
Route::get('/file', 'FileController@ShowFile');

//Route::get('login', [LoginController::class, 'ShowLogin']);


Route::get('welcome', function () {
    return view('welcome');
});

Route::post('/host', 'HostController@insertHost');
Route::put('/host', 'HostController@updateHost');
Route::delete('/host', 'HostController@deleteHost');

Route::post('/service', 'ServiceController@insertService');
Route::put('/service', 'ServiceController@updateService');
Route::delete('/service', 'ServiceController@deleteService');

Route::post('/equipement', 'EquipementController@insertEquipement');
Route::put('/equipement', 'EquipementController@updateEquipement');
Route::delete('/equipement', 'EquipementController@deleteEquipement');

Route::post('/user', 'UserController@insertUser');
Route::put('/user', 'UserController@updateUser');
Route::delete('/user', 'UserController@deleteUser');

Route::post('/login', 'LoginController@CheckConnexion');
Route::get('/login/{session}', 'LoginController@destroy');

/*
Route::get('/create', 'UserCreate@Create');
Route::post('/store', 'UserCreate@store');
Route::get('/welcome', 'LoginController@ShowHome');
Route::get('/info', 'Info@home');*/



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
