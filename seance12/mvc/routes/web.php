<?php
use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\ClientController;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/index', 'HomeController@index');

Route::get('/clients', 'ClientController@index');

Route::dispatch();
