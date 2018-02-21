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
});
*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'],function () {
    Route::get('/','AdminController@index')->name('home');
    Route::get('/admin', function () {
        echo "asd";
    });
    Route::get('/home', 'AdminController@index')->name('home');
    Route::get('/dashboard', 'AdminController@index')->name('home');

    Route::resource('/computers','ComputersController');
    Route::resource('/users','UsersClubController');
    //Route::get('/', 'Auth\LoginController@showLoginForm');
    //Route::post('login', 'Auth\LoginController@login');
    //Route::post('logout', 'Auth\LoginController@logout');
    Route::Auth();
});
    
Route::namespace('Connect')->group(function () {
    Route::get('/',function(){
        return view('connect.get');
    });
    Route::post('/', 'connect\MainController@store');
});
