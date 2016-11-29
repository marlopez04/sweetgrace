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
Route::get('/', function(){
	return view('front.index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::resource('users','UsersController');

	Route::get('users/{id}/destroy', [
		'uses' => 'UsersController@destroy',
		'as'   => 'admin.users.destroy'
	]);

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

	Route::resource('pedidos', 'PedidosController');
	Route::get('pedidos/{id}/destroy',[
		'uses' => 'PedidosController@destroy',
		'as'   => 'admin.pedidos.destroy'
	]);

	Route::resource('categorias', 'CategoriasController');
	Route::get('categorias/{id}/destroy',[
		'uses' => 'CategoriasController@destroy',
		'as'   => 'admin.categorias.destroy'
	]);

	Route::resource('articulos', 'ArticulosController');
	Route::get('articulos/{id}/destroy',[
		'uses' => 'ArticulosController@destroy',
		'as'   => 'admin.articulos.destroy'
	]);

	Route::resource('precios', 'ListaPreciosController');
	Route::get('precios/{id}/destroy',[
		'uses' => 'ListaPreciosController@destroy',
		'as'   => 'admin.precios.destroy'
	]);

	Route::resource('pedidosarticulos', 'PedidosArticulosController');
	Route::get('pedidosarticulos/{id}/destroy',[
		'uses' => 'PedidosArticulosController@destroy',
		'as'   => 'admin.pedidosarticulos.destroy'
	]);

});

Route::get('admin/auth/login', [
	'uses' => 'Auth\AuthController@getLogin',
	'as'   => 'admin.auth.login'
	]);

Route::post('admin/auth/login', [
	'uses' => 'Auth\AuthController@postLogin',
	'as'   => 'admin.auth.login'
	]);

Route::get('admin/auth/logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as'   => 'admin.auth.logout'
	]);
