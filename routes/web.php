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
Route::resource('vinicolas.marcas','Web\Vinicola\VinicolaMarcasController');
Route::resource('vinicolas.uvas','Web\Vinicola\VinicolaUvasController');
Route::resource('vinicolas.barricas','Web\Vinicola\VinicolaBarricasController');
Route::resource('empleados','Web\Empleados\EmpleadosController');
Route::get('clientes', function(){
	return view('reporte.cliente');
})->name('clientes');
Route::get('ventas', function(){
	return view('reporte.venta');
})->name('ventas');
Route::get('puntos_corchos',function ()
{
	return view('reporte.pcorcho');
})->name('puntos_corchos');
