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

/*   ----------rotuas que estaba probando------
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
   ----------rotuas que estaba probando------ */

Route::group(['prefix' => 'admin'], function(){

	Route::get('/',['as' => 'admin.index', function () {
    return view('admin.index');
	}]);

	Route::resource('insumos', 'InsumosController');
	Route::get('insumos/{id}/destroy',[
		'uses' => 'InsumosController@destroy',
		'as'   => 'admin.insumos.destroy'
	]);

	Route::resource('ingredientes', 'IngredientesController');
	Route::get('ingredientes/{id}/destroy',[
		'uses' => 'IngredientesController@destroy',
		'as'   => 'admin.ingredientes.destroy'
	]);

	Route::resource('stockingredientes', 'StockingredIentesController');
	Route::get('stockingredientes/{id}/destroy',[
		'uses' => 'StockIngredientesController@destroy',
		'as'   => 'admin.stockingredientes.destroy'
	]);

});