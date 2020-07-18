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
Route::resource('usuarios','Web\Usuario\UsuarioController');
Route::resource('perfiles','Web\Perfil\PerfilController');
Route::resource('ofertas','Web\Oferta\OfertaController');
Route::resource('paquetes','Web\Paquete\PaqueteController');
Route::resource('uvas','Web\Uva\UvaController');
Route::resource('vinicolas', 'Web\Vinicola\VinicolaController');


Route::get('productores/vinos','Web\Productor\ProductorVinoController@index')->name('productores.vinos.index');
Route::get('productores/vinos/create','Web\Productor\ProductorVinoController@create')->name('productores.vinos.create');
Route::get('productores/vinos/edit','Web\Productor\ProductorVinoController@edit')->name('productores.vinos.edit');
Route::post('productores/vinos','Web\Productor\ProductorVinoController@store')->name('productores.vinos.store');
Route::delete('productores/vinos','Web\Productor\ProductorVinoController@destroy')->name('productores.vinos.destroy');

Route::get('productores/uvas/create','Web\Productor\ProductorUvaController@create')->name('productores.uvas.create');
Route::post('productores/uvas','Web\Productor\ProductorUvaController@store')->name('productores.uvas.store');

Route::get('enoturistas/create','Web\Productor\EnoturistaController@create')->name('enoturistas.create');

Route::resource('vinicolas','Web\Vinicola\VinicolaController');
Route::post('uvas/{uvaVin}/destroy','Web\Vinicola\UvaVinicolaController@destroy')->name('uvas.destroy');
Route::resource('bodegas','Web\Bodega\BodegaController');
Route::post('barrica/{barrica}/destroy','Web\Bodega\BodegaBarricaController@destroy')->name('barrica.destroy');
Route::resource('barricas','Web\Barrica\BarricaController');
Route::resource('barricas.procesos','Web\Barrica\ProcesoController');
Route::resource('empleados','Web\Empleados\EmpleadosController');
Route::resource('posts','Web\Post\PostController');
Route::resource('regiones','Web\Region\RegionController');
Route::post('/posts/imagenUpload','Web\Post\PostController@imagenUpload')->name('posts.imageUpload');
Route::post('/posts/videoUpload','Web\Post\PostController@videoUpload')->name('posts.videoUpload');
Route::post('/posts/fileUpload','Web\Post\PostController@fileUpload')->name('posts.fileUpload');
Route::get('/post/{slug}','Web\Post\PostController@showPost')->name('posts.slug');
Route::get('/posts/categorias/{slug}','Web\Post\CategoriaController@index')->name('posts.categorias.slug');
Route::get('/posts/etiquetas/{slug}','Web\Post\TagController@index')->name('posts.etiquetas.slug');
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


// Vistas para Landing page
Route::get('muvas', function (){
	$uvas = App\Uva::orderBy('title','asc')->get();
	return view('muestras.uvas',['uvas'=>$uvas]);
});
Route::get('mvinicolas', function (){
	$vinicolas = App\Vinicola::orderBy('nombre','asc')->get();
    return view('muestras.vinicolas',['vinicolas'=>$vinicolas]);
});
Route::get('menologos', function (){
	$enologos= App\Enologo::get();
    return view('muestras.enologos',['enologos'=>$enologos]);
});
