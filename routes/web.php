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
Route::any('/admin',function(){
    //Route::get('/','Admin\AdminController@index')->name('home');
    Route::get('/admin', function () {
        echo "asd";
    });
    Route::get('/home', 'Admin\AdminController@index')->name('home');
    Route::get('/dashboard', 'Admin\AdminController@index')->name('home');

    Route::resource('/computers','Admin\ComputersController');
    Route::resource('/users','Admin\UsersClubController');
    //Route::get('/', 'Auth\LoginController@showLoginForm');
    //Route::post('login', 'Auth\LoginController@login');
    //Route::post('logout', 'Auth\LoginController@logout');
    Route::Auth();
});
    
Route::any('/connect',function(){
    Route::get('/',function(){
        return view('connect.get');
    });
    Route::post('/', 'connect\MainController@store');
});
