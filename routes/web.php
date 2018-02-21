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
Route::get('/admin','Admin\AdminController@index')->name('home');
//Route::get('/admin', function () {
    echo "asd";
//});
Route::get('/admin/home', 'Admin\AdminController@index')->name('home');
Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('home');

Route::resource('/admin/computers','Admin\ComputersController');
Route::resource('/admin/users','Admin\UsersClubController');
//Route::get('/', 'Auth\LoginController@showLoginForm');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout');
Route::Auth();
    
Route::get('/connect',function(){
    return view('connect.get');
});
Route::post('/connect', 'connect\MainController@store');
