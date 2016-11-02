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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function(){
	return view('front.index');
});

Route::get('/admin2', function(){
	return view('admin.index2');
});

Route::get('/contacto', function(){
	return view('front.contacto');
});

Route::get('/admin', function(){
	return view('admin.index');
});
