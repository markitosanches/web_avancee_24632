<?php
require_once 'routes/Route.php';
require_once 'controllers/HomeController.php';

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/index', 'HomeController@index');
