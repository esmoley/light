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
Route::group(array('domain'=>config('app.domain')),function () {
    Route::get('/admin',function(){
        return redirect("//admin.".config('app.domain')."/");
    });
    Route::get('/',function(){
        echo "Are you looking for: <a href='http://admin.".config('app.domain')."/'>http://admin.".config('app.domain')."/</a>?";
    });
});
Route::group(array('domain'=>"admin.".config('app.domain')),function () {
//Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/','Admin\AdminController@index')->name('home');
    /*Route::get('/', function () {
        echo "asd";
    });*/
    Route::get('/home', 'Admin\AdminController@index')->name('home');
    Route::get('/dashboard', 'Admin\AdminController@index')->name('home');

    Route::resource('/computers','Admin\ComputersController');
    Route::resource('/users','Admin\UsersClubController');
    //Route::get('/', 'Auth\LoginController@showLoginForm');
    //Route::post('login', 'Auth\LoginController@login');
    //Route::post('logout', 'Auth\LoginController@logout');
    Route::Auth();
});
Route::group(array('domain'=>"connect.".config('app.domain')),function () {
    Route::get('/',function(){
        return view('connect.get');
    });
    Route::post('/', 'connect\MainController@store');
});
