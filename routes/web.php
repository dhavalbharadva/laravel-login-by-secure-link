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

/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */
Route::get('', 'Frontend\HomeController@index');
Route::post('sendemail', array('uses' => 'Frontend\HomeController@sendEmail', 'as' => 'sendemail'));

Route::get('user/login/{token}', 'Frontend\HomeController@login');

//after login
Route::group(array('middleware' => 'auth.user'), function() {
    Route::get('dashboard', 'Frontend\HomeController@dashboard');
    Route::get('logout', 'Frontend\HomeController@logout');
});