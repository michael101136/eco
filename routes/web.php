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

Route::get('/prueba','HomeController@envio');

Route::get('/', function () {
    return redirect('/es');
});
Route::get('/detalle', function () {
    return view('assets.pagina.detalle');
});




/*_______________ Admin _____________________________________________________________________________________________________________*/
Route::get('logout',['as' =>'logout','uses' => 'Auth\LoginController@logout']);
Route::resource('producto','ProductoController');
Route:: get('create/producto/{tourOpcion?}', [
		'uses' => 'ProductoController@createTour',
		'as' => 'producto.create'
]);
Route::post('tours/cargar/', [ 'uses' => 'ProductoController@cargarImagens' ])->name('CargarImagenTour');
Route::post('tours/updateTours/', [ 'uses' => 'ProductoController@updateTourCampos' ])->name('updateTours');
Route::post('tours/categoria/TourUpdateCategoria', [ 'uses' => 'ProductoController@TourUpdateCategoria' ])->name('TourUpdateCategoria');
Route::get('tour/listar/{id?}', [ 'uses' => 'ProductoController@listarImagenesToursUpdate' ])->name('listarImagenesToursUpdate');
Route::post('updateImagenTours' , ['as'=>'updateImagenTours','uses'=>'ProductoController@updateImagenTours']);

Route::resource('users','UsersController');
Route::resource('categories','CategorieController');
Route::resource('testimonio','TestimonioController');
Route:: get('testimonio/cambioestado/{id}', [
	'uses' => 'TestimonioController@cambioEstado',
	'as' => 'testimonio.estado'
]);
Route:: get('reserva/cambioestado/{id}', [
	'uses' => 'ReservationController@cambioEstado',
	'as' => 'reserva.estado'
]);
Route::resource('Itinerario','ItinerarioController');
Route::get('tour/createItinerario/{id?}', [ 'uses' => 'ItinerarioController@createItinerario' ])->name('createItinerario');
Route::post('tours/Itinerario/insertarItinerario', [ 'uses' => 'ItinerarioController@insertarItinerario' ])->name('insertarItinerario');
Route::get('tour/itinerario/{id?}', [ 'uses' => 'ItinerarioController@listarItinerarios' ])->name('listarItinerarios');
Route::get('tour/showItinerario/{id?}', [ 'uses' => 'ItinerarioController@showItinerario' ])->name('showItinerario');
Route::get('tour/deleteItinerario/{id?}',[ 'uses' => 'ItinerarioController@delete_itinerario' ])->name('delete_itinerario');
Route::post('tours/cargarImagenItinerario/', [ 'uses' => 'ItinerarioController@cargarImagenItinerario' ])->name('CargarImagenItinerario');
Route::post('tours/updateItinerario/', [ 'uses' => 'ItinerarioController@updateItinerario' ])->name('updateItinerario');
Route::post('tours/UpdateImagenItinerario/', [ 'uses' => 'ItinerarioController@UpdateImagenItinerario' ])->name('UpdateImagenItinerario');

/*_________________________________________________________________________________________________________________blog*/

Route::resource('categoria_controller', 'CategoriaBlogController');
Route:: POST('/sub_categoria-save', 
[
	'uses' => 'SubCategoriaController@create_sub_categoria',
	'as' => 'sub_categoria.save'
]);
Route:: POST('/listar_sub_categoria', 
[
	'uses' => 'SubCategoriaController@listar',
	'as' => 'sub_categoria.listar'
]);

Route:: POST('/eliminar_sub_categoria', 
[
	'uses' => 'SubCategoriaController@eliminar',
	'as' => 'sub_categoria.eliminar'
]);
Route::resource('blogs', 'BlogController');
Route:: POST('/images-save', 
[
	'uses' => 'BlogController@storeImagen',
	'as' => 'blog.save'
]);
Route:: POST('/saveContenidoBlog', 
[
	'uses' => 'BlogController@saveContenidoBlog',
	'as' => 'blog.contenido'
]);
Route:: POST('/saveCambioImagenBlog', 
[
	'uses' => 'BlogController@saveCambioImagenBlog',
	'as' => 'blog.cambioImagen'
]);

Route::resource('reservation','ReservationController');
Route::resource('multimedia','MultimediaController');
Route::resource('imagen','ImageController');
Route::get('image/listar/{id?}', [ 'uses' => 'ImageController@listarImagenes' ])->name('listarImagenes');
Route::get('image/delete/{id?}',[ 'uses' => 'ImageController@delete_img' ])->name('EliminarImagenes');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
/*_______________ Fin admin_____________________________________________________________________________________________________________*/




/*_______________ Pagina web en español _____________________________________________________________________________________________________________*/

Route::get('/contacto', [ 'uses' => 'PublicController@contacto' ])->name('contacto');
Route::get('detalleProducto',['uses'=>'PublicController@detalleproducto'])->name('detalleProducto');
Route::get('/{idioma?}', [ 'uses' => 'PublicController@index' ]);
Route::get('{lang?}/categoria/{search?}', [ 'uses' => 'PublicController@tours' ])->name('paquetesCategoriaES');
Route::get('{lang?}/tours/filtro/{precio?}/{departamento?}', [ 'uses' => 'PublicController@toursPrecioCiudad' ])->name('paquetesCategoriaPrecioCiudadES');


/*_______________ Fin web en español _____________________________________________________________________________________________________________*/

/*_______________ Reservacion_________________ */
Route::resource('reservations','ReservationController');
/*______________ Fin reservacion _____________________ */
Route:: get('es/add-to-cart/{id}/{can?}', [
		'uses' => 'ProductController@getAddToCart',
		'as' => 'product.addToCart'
]);
Route:: get('es/reduce/{id}', [
		'uses' => 'ProductController@getReduceByOne',
		'as' => 'product.reduceByOne'
]);
Route:: get('es/remove/{id}', [

		'uses' => 'ProductController@getRemoveItem',
		'as' => 'product.remove'
	
]);
Route:: get('{idioma?}/details/shopping-cart/', [
	
		'uses' => 'ProductController@getCart',
		'as' => 'product.shoppingCart'
]);
Route:: get('{idioma?}/detalle/shopping-cart/', [
		'uses' => 'ProductController@getCart',
		'as' => 'product.shoppingCartEs'
]);
Route:: get('es/datos/checkout', [
		'uses' => 'ProductController@getCheckout',
		'as' => 'checkout'
]);
Route:: POST('es/datos/checkout', [
		'uses' => 'ProductController@postCheckout',
		'as' => 'checkoutPost'
]);
Route:: POST('es/registrar/testimonios/', 
[
	'uses' => 'PublicController@ingresarTestimonio',
	'as' => 'create.ingresarTestimonio'
]);

Route:: POST('/es/proceso/transaction_token/', ['uses' => 'ProductController@transactionToken',])->name('transaction');
Route::resource('contacto-reserva','ContactController');

/*_______________ Add carrito de compra_____________________________________________________________________________________________________________*/





