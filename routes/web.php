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


/* RUTAS CATEGORIAS */ 
Route::group(['prefix' => 'categorias', 'middleware' => ['auth', 'rol']], function(){
    Route::get('/', 'CategoriasController@index')->name('categorias.index');
    Route::get('/create', 'CategoriasController@create')->name('categorias.create');
    Route::post('/store', 'CategoriasController@store')->name('categorias.store');
    Route::get('/show/{id}', 'CategoriasController@show')->name('categorias.show');
    Route::post('/update', 'CategoriasController@update')->name('categorias.update');
    Route::post('/delete', 'CategoriasController@delete')->name('categorias.delete');
});

/* RUTAS SUBCATEGORIAS */
Route::group(['prefix' => 'subcategorias', 'middleware' => ['auth', 'rol']], function(){
    Route::get('/', 'SubcategoriasController@index')->name('subcategorias.index');
    Route::get('/create', 'SubcategoriasController@create')->name('subcategorias.create');
    Route::post('/store', 'SubcategoriasController@store')->name('subcategorias.store');
    Route::get('/show/{id}', 'SubcategoriasController@show')->name('subcategorias.show');
    Route::post('/update', 'SubcategoriasController@update')->name('subcategorias.update');
});

/* RUTAS SUBCATEGORIAS */
Route::group(['prefix' => 'foros', 'middleware' => ['auth']], function(){
    Route::get('/', 'ForosController@index')->name('foros.index');
    Route::get('/{path_url}', 'ForosController@subcategoria')->name('foros.subcategoria');
    Route::get('/{path_url}/nuevo_tema', 'ForosController@nuevo')->name('foros.nuevo');
    Route::post('/{path_url}/crear_tema', 'ForosController@crear')->name('foros.crear');
    Route::get('/{path_url}/{path_tema}', 'ForosController@tema')->name('foros.tema');
});

/* RUTAS TEMAS */ 
Route::group(['prefix' => 'posts', 'middleware' => ['auth']], function(){
    Route::post('/responder', 'PostsController@responder')->name('posts.responder');
});

Route::get('/home', 'HomeController@index')->name('home');
