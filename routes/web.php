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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('uvas','Web\Uva\UvaController');
Route::resource('vinicolas', 'Web\Vinicola\VinicolaController');
Route::resource('enologos','Web\Enologo\EnologoController');
Route::resource('vinicolas','Web\Vinicola\VinicolaController');
Route::post('uvas/{uvaVin}/destroy','Web\Vinicola\UvaVinicolaController@destroy')->name('uvas.destroy');
Route::resource('bodegas','Web\Bodega\BodegaController');
Route::post('barrica/{barrica}/destroy','Web\Bodega\BodegaBarricaController@destroy')->name('barrica.destroy');
Route::resource('productores','Web\Productor\ProductorController');
Route::resource('barricas','Web\Barrica\BarricaController');
Route::resource('barricas.procesos','Web\Barrica\ProcesoController');
Route::resource('empleados','Web\Empleados\EmpleadosController');
Route::get('clientes', function(){
	return view('reporte.cliente');
})->name('clientes');
Route::get('ventas','VentasController@index')->name('ventas');
Route::get('puntos_corchos',function ()
{
	$users = App\User::get();
	return view('reporte.pcorcho',['users'=>$users]);
})->name('puntos_corchos');
Route::get('viajes', function (){
	return view('reporte.viajes');
})->name('viajes');
Route::get('cursos', function (){
	return view('reporte.cursos');
})->name('cursos');
Route::get('prodBodega/{id}','Web\Productor\ProductorController@bodega');
Route::get('prodVinicola/{id}','Web\Productor\ProductorController@vinicola');
Route::get('prodBarricas/{id}','Web\Productor\ProductorController@barricas');
Route::get('prodUvas/{id}','Web\Productor\ProductorController@uvas');
Route::get('bodBarricas/{id}','Web\Bodega\BodegaController@barricas');
Route::get('bodUvas/{id}','Web\Bodega\BodegaController@uvas');

Route::get('getEnologos','Web\Enologo\EnologoController@enologos');

Route::get('getWineMaker','Web\Enologo\EnologoController@wine');
