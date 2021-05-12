<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
#Route::get('/', 'HomeController@home')->name('index');
Route::get('/', 'HomeController@index')->name('log');
Route::get('/home', 'HomeController@home')->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/{tipo?}/{categoria?}', 'HomeController@dashboard_c')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios', 'HomeController@usuarios_c')->name('usuarios');


Route::prefix('/informacion')->group(function () {
    #ESTAS RUTAS FUNCIONAN CON EL MODELO NEWS
    Route::get('/crear/{tipo}', 'ContentController@create_page')->name('create-page');
    Route::post('/guardar-noticia', 'ContentController@save_page')->name('save-page');
    Route::get('/actualidad/{categoria?}', 'ContentController@show_pages_news')->name('show-pages-news');
    Route::get('/actualidad/{id}/{noticia_name_id}', 'ContentController@read_page_news')->name('show-page-news');
    Route::get('/actualizar/{id}', 'ContentController@update_page')->name('edit-page');
    Route::post('/guardar-actualizar-noticia', 'ContentController@save_update_page')->name('save-update-page');
    Route::get('/eliminar/{id}', 'ContentController@delete_page')->name('delete-page');

    #EVENTOS:
    Route::get('/eventos/{categoria?}', 'ContentController@show_pages_events')->name('show-pages-events');
    Route::get('/eventos/{id}/{noticia_name_id}', 'ContentController@read_page_event')->name('show-page-event');

    #WIKIS
    Route::get('/wikis/{categoria?}', 'ContentController@show_pages_wikis')->name('show-pages-wikis');
    Route::get('/wikis/{id}/{noticia_name_id}', 'ContentController@read_page_wikis')->name('show-page-wikis');

    #SITIOS
    Route::get('/sitios/{categoria?}', 'ContentController@show_pages_sitios')->name('show-pages-sitios');
    Route::get('/sitios/{id}/{noticia_name_id}', 'ContentController@read_page_sitios')->name('show-page-sitios');
});


#CREA UN NUEVO USUARIO UTILIZANDO EL FORMULARIO DE EDICION DE USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/crear/usuario', 'HomeController@crear_usuario')->name('nuevo_usuario');
#Route::get('/crear/usuario', 'HomeController@crear_usuario')->name('nuevo_usuario');
Route::post('/guardar/usuario', 'HomeController@guardar_usuario');

#MODIFICA UN USUARIO UTILIZANDO EL FORMULARIO DE EDICION DE USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/modificar/usuario/{id}', 'HomeController@modificar_usuario')->name('modificar-usuario');
Route::middleware(['auth:sanctum', 'verified'])->get('/actualizar/usuario/', 'HomeController@actualizar_usuario')->name('actualizar-usuario');
Route::middleware(['auth:sanctum', 'verified'])->get('/eliminar/usuario/{id}', 'HomeController@eliminar_usuario')->name('eliminar-usuario');

#ADMINISTRACION CRUD DE SLIDERS
Route::prefix('/slider')->group(function () {
    Route::get('/admin', 'FileController@admin_sliders')->name('admin-sliders');
    Route::get('/crear', 'FileController@crear_sliders');
    Route::get('/eliminar/{id}', 'FileController@eliminar_sliders');
    Route::post('/guardar', 'FileController@guardar_slider');
});

#ADMINISTRACION CRUD CATEGORIAS
Route::prefix('/categoria')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/administracion', 'CategoryController@admin_categories')->name('admin-categories');
    #Route::get('/administracion', 'CategoryController@admin_categories')->name('admin-categories');
    Route::middleware(['auth:sanctum', 'verified'])->get('/crear', 'CategoryController@create_category')->name('create-category');
    #Route::get('/crear', 'CategoryController@create_category')->name('create-category');
    Route::post('/guardar', 'CategoryController@save_category')->name('save-category');
    Route::middleware(['auth:sanctum', 'verified'])->get('/editar/{id}', 'CategoryController@edit_category')->name('edit-category');
    #Route::get('/editar/{id}', 'CategoryController@edit_category')->name('edit-category');
    Route::post('/guardar-actualizar-categoria', 'CategoryController@save_update_category')->name('save-update-category');
    Route::middleware(['auth:sanctum', 'verified'])->get('/eliminar/{id}', 'CategoryController@delete_category')->name('delete-category');
    #Route::get('/eliminar/{id}', 'CategoryController@delete_category')->name('delete-category');
});

#ADMINISTRACION CRUD MEDIOS
Route::prefix('/medios')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/mostrar', 'MediosController@show_medios')->name('admin-medios');
    #Route::get('/administracion', 'CategoryController@admin_categories')->name('admin-categories');
    Route::middleware(['auth:sanctum', 'verified'])->post('/subir', 'MediosController@subir_medio')->name('subir-medio');

});

# CRUD CUMPLEANIOS Y CRUD ADMIN-CUMPLEANIOS
Route::prefix('/cumpleanios')->group(function () {
    Route::get('/admin-cumpleanios', 'CumpleaniosController@indexAdminCumpleanios')->name('admin-cumpleanios');
    Route::post('administradoresCumpleanios', 'CumpleaniosController@createAdmin');
    Route::get('/eliminarAdminCumple/{id}', 'CumpleaniosController@destroyAdminCumple');
    Route::post('admin-cumple-update', 'CumpleaniosController@updateAdminCumple');
    Route::get('/cumpleanios', 'CumpleaniosController@index')->name('cumpleanios-board');
    Route::post('/csv-cumpleanios', 'CumpleaniosController@insertFile');
    Route::get('/eliminarCumpleanios/{id}', 'CumpleaniosController@destroy')->name('eliminar-cumpleanios');
    Route::post('/cumpleanios-update', 'CumpleaniosController@update');
    Route::post('nuevo-cumpleanios', 'CumpleaniosController@insert');
});
