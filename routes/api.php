<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user','User\UserController@getUser');
Route::middleware('auth:api')->post('/password','User\UserController@changePassword');

Route::resource('users', 'User\UserController', ['except'=>['create', 'edit','update']]);
Route::middleware('auth:api')->put('users/{user}', 'User\UserController@update')->name('users.update');
Route::middleware('auth:api')->resource('fiscales', 'Api\User\UserDomFiscalController', ['except'=>['create','show','edit']]);

Route::middleware('auth:api')->resource('domicilios', 'Api\User\UserDomEnvioController', ['except'=>['create','edit']]);

Route::middleware('auth:api')->resource('cards', 'Api\User\UserTarjetasController', ['except'=>['create','update','edit']]);

Route::resource('vinicolas','Api\Vinicola\VinicolaController',['only'=>'index']);
Route::resource('barricas','Api\Barrica\BarricaController',['only'=>['index','show']]);
Route::middleware('auth:api')->get('puntos_corchos','Api\User\UserPuntoController@index');
Route::middleware('auth:api')->post('puntos_corchos','Api\User\UserPuntoController@store');
Route::middleware('auth:api')->post('puntos_corchos/check', 'Api\Punto\PuntoController@canjear');
// Route::middleware('auth:api')->put('fiscales', 'Api\User\UserDomFiscalController@update');

Route::post('mivino','Api\Barrica\BarricaController@search');

Route::group(['middleware' => ['cors']], function () {
    //Rutas a las que se permitirá acceso
    Route::get('bodegas', 'Api\Bodega\BodegaController@index');
    Route::resource('uvas', 'Api\Uva\UvaController',['only'=>'index']);
    Route::get('enologos', 'Api\Enologo\EnologoController@index');
    Route::get('ofertas', 'Api\Oferta\OfertaController@index');
    Route::get('cursos', 'Api\Curso\CursoController@index');
    Route::get('enoturistas', 'Api\Enoturista\EnoturistaController@index');
});


Route::middleware('auth:api')->get('/shopping_carts','Api\User\UserShoppingCart@index');
Route::middleware('auth:api')->post('/add_in_cart','Api\User\UserShoppingCart@addInShoppingCart');
Route::middleware('auth:api')->delete('/remove_in_cart','Api\User\UserShoppingCart@removeInShoppingCart');
Route::middleware('auth:api')->get('/in_shopping_cart','Api\User\UserShoppingCart@InShoppingCartCount');
// Route::get('/url','controller@function') -> middleware('cors');
Route::get('ofertas/cotizar', 'Api\Oferta\OfertaController@cotizar');
Route::post('ventas', 'Api\Venta\VentaController@store');
Route::get('users/{user}/compras', 'Api\User\VentaController@index');
Route::get('paises/{pais}/regiones', 'Api\Pais\PaisController@regiones');