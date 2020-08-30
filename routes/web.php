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

Route::get('/', function (){
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});


    Route::post('/sign-in', 'LoginController@signIn')->name('signIn');
    Route::get('/home', 'HomeController@index')->name('index');

    Route::post('/add-device', 'DevicesController@store')->name('device.add');
    Route::patch('/edit-device/{id}', 'DevicesController@update')->name('device.update');
    Route::delete('/delete-device/{id}', 'DevicesController@destroy')->name('device.destroy');
    Route::delete('/remove-user/{id}', 'DevicesController@removeUser')->name('remove.user');

    Route::post('/add-user', 'UsersController@store')->name('user.add');
    Route::delete('/delete-user/{id}', 'UsersController@destroy')->name('user.destroy');

Route::post('/add-setting', 'SettingsController@store')->name('setting.add');
Route::patch('/edit-setting/{id}', 'SettingsController@update')->name('setting.update');
Route::delete('/delete-setting/{id}', 'SettingsController@destroy')->name('setting.destroy');
//Route::resource('/devices', 'DevicesController');
