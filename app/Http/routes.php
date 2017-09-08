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