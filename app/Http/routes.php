<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FrontController@index');
Route::get('/about', 'FrontController@about');
Route::get('/contact', 'FrontController@contact');
Route::get('/login', 'FrontController@login');
Route::get('/admin', 'FrontController@overall');
Route::get('/admin/getdetails', 'FrontController@getdetails');
Route::get('/admin/export', 'FrontController@export');


Route::get('/home', 'FrontController@home');
Route::post('/home', 'FrontController@home_login');
Route::get('/dashboard', 'FrontController@dashboard');
Route::get('/history', 'FrontController@history');
Route::get('/computerlist', 'FrontController@computerlist');
Route::get('/eventlog', 'FrontController@eventlog');
Route::get('/profile', 'FrontController@profile');
Route::post('/profile', 'FrontController@profile_submit');
Route::get('/report', 'FrontController@report');
Route::get('/report/view', 'FrontController@report_view');
Route::get('/report/view2', 'FrontController@report_view2');
Route::get('/report/export', 'FrontController@report_export');
Route::get('/logout', 'FrontController@logout');