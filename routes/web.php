<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\Auth\GoogleController;

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
    Route::middleware(['auth:sanctum', 'verified'])->get('/crear/{tipo}', 'ContentController@create_page')->name('create-page');
    Route::middleware(['auth:sanctum', 'verified'])->post('/guardar-noticia', 'ContentController@save_page')->name('save-page');
    Route::middleware(['auth:sanctum', 'verified'])->get('/actualidad/{categoria?}', 'ContentController@show_pages_news')->name('show-pages-news');
    Route::middleware(['auth:sanctum', 'verified'])->get('/actualidad/{id}/{noticia_name_id}', 'ContentController@read_page_news')->name('show-page-news');
    Route::middleware(['auth:sanctum', 'verified'])->get('/actualizar/{id}', 'ContentController@update_page')->name('edit-page');
    Route::middleware(['auth:sanctum', 'verified'])->post('/guardar-actualizar-noticia', 'ContentController@save_update_page')->name('save-update-page');
    Route::middleware(['auth:sanctum', 'verified'])->get('/eliminar/{id}', 'ContentController@delete_page')->name('delete-page');

    #EVENTOS:
    Route::middleware(['auth:sanctum', 'verified'])->get('/eventos/{categoria?}', 'ContentController@show_pages_events')->name('show-pages-events');
    Route::middleware(['auth:sanctum', 'verified'])->get('/eventos/{id}/{noticia_name_id}', 'ContentController@read_page_event')->name('show-page-event');

    #WIKIS
    Route::middleware(['auth:sanctum', 'verified'])->get('/wikis/{categoria?}', 'ContentController@show_pages_wikis')->name('show-pages-wikis');
    Route::middleware(['auth:sanctum', 'verified'])->get('/wikis/{id}/{noticia_name_id}', 'ContentController@read_page_wikis')->name('show-page-wikis');

    #SITIOS
    Route::middleware(['auth:sanctum', 'verified'])->get('/sitios/{categoria?}', 'ContentController@show_pages_sitios')->name('show-pages-sitios');
    Route::middleware(['auth:sanctum', 'verified'])->get('/sitios/{id}/{noticia_name_id}', 'ContentController@read_page_sitios')->name('show-page-sitios');
});


#CREA UN NUEVO USUARIO UTILIZANDO EL FORMULARIO DE EDICION DE USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/crear/usuario', 'HomeController@crear_usuario')->name('nuevo_usuario');
#Route::get('/crear/usuario', 'HomeController@crear_usuario')->name('nuevo_usuario');
Route::middleware(['auth:sanctum', 'verified'])->post('/guardar/usuario', 'HomeController@guardar_usuario');

#MODIFICA UN USUARIO UTILIZANDO EL FORMULARIO DE EDICION DE USUARIO
Route::middleware(['auth:sanctum', 'verified'])->get('/modificar/usuario/{id}', 'HomeController@modificar_usuario')->name('modificar-usuario');
Route::middleware(['auth:sanctum', 'verified'])->post('/actualizar/usuario/', 'HomeController@actualizar_usuario')->name('actualizar-usuario');
Route::middleware(['auth:sanctum', 'verified'])->get('/eliminar/usuario/{id}', 'HomeController@eliminar_usuario')->name('eliminar-usuario');

#ADMINISTRACION CRUD DE SLIDERS
Route::prefix('/slider')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/admin', 'FileController@admin_sliders')->name('admin-sliders');
    Route::middleware(['auth:sanctum', 'verified'])->get('/crear', 'FileController@crear_sliders');
    Route::middleware(['auth:sanctum', 'verified'])->get('/eliminar/{id}', 'FileController@eliminar_sliders');
    Route::middleware(['auth:sanctum', 'verified'])->post('/guardar', 'FileController@guardar_slider');
});

#ADMINISTRACION CRUD CATEGORIAS
Route::prefix('/categoria')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/administracion', 'CategoryController@admin_categories')->name('admin-categories');
    #Route::get('/administracion', 'CategoryController@admin_categories')->name('admin-categories');
    Route::middleware(['auth:sanctum', 'verified'])->get('/crear', 'CategoryController@create_category')->name('create-category');
    #Route::get('/crear', 'CategoryController@create_category')->name('create-category');
    Route::middleware(['auth:sanctum', 'verified'])->post('/guardar', 'CategoryController@save_category')->name('save-category');
    Route::middleware(['auth:sanctum', 'verified'])->get('/editar/{id}', 'CategoryController@edit_category')->name('edit-category');
    #Route::get('/editar/{id}', 'CategoryController@edit_category')->name('edit-category');
    Route::middleware(['auth:sanctum', 'verified'])->post('/guardar-actualizar-categoria', 'CategoryController@save_update_category')->name('save-update-category');
    Route::middleware(['auth:sanctum', 'verified'])->get('/eliminar/{id}', 'CategoryController@delete_category')->name('delete-category');
    #Route::get('/eliminar/{id}', 'CategoryController@delete_category')->name('delete-category');
});

#ADMINISTRACION CRUD MEDIOS
/*
Route::prefix('/medios')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/mostrar', 'MediosController@show_medios')->name('admin-medios');
    #Route::get('/administracion', 'CategoryController@admin_categories')->name('admin-categories');
    Route::middleware(['auth:sanctum', 'verified'])->post('/subir', 'MediosController@subir_medio')->name('subir-medio');

});
*/
#ADMINISTRACION CRUD MEDIOS
Route::group(['prefix' => 'medios'], function ()
{
    Route::middleware(['auth:sanctum', 'verified'])->get('/show_medios', 'MediosController@show_medios')->name('admin-medios');
    Route::middleware(['auth:sanctum', 'verified'])->post('/subir_medio', 'MediosController@subir_medio')->name('subir-medio');
});

# CRUD CUMPLEANIOS Y CRUD ADMIN-CUMPLEANIOS
Route::prefix('/cumpleanios')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/admin-cumpleanios', 'CumpleaniosController@indexAdminCumpleanios')->name('admin-cumpleanios');
    Route::middleware(['auth:sanctum', 'verified'])->post('administradoresCumpleanios', 'CumpleaniosController@createAdmin');
    Route::middleware(['auth:sanctum', 'verified'])->get('/eliminarAdminCumple/{id}', 'CumpleaniosController@destroyAdminCumple');
    Route::middleware(['auth:sanctum', 'verified'])->post('admin-cumple-update', 'CumpleaniosController@updateAdminCumple');
    Route::middleware(['auth:sanctum', 'verified'])->get('/cumpleanios', 'CumpleaniosController@index')->name('cumpleanios-board');
    Route::middleware(['auth:sanctum', 'verified'])->post('/csv-cumpleanios', 'CumpleaniosController@insertFile');
    Route::middleware(['auth:sanctum', 'verified'])->get('/eliminarCumpleanios/{id}', 'CumpleaniosController@destroy')->name('eliminar-cumpleanios');
    Route::middleware(['auth:sanctum', 'verified'])->post('/cumpleanios-update', 'CumpleaniosController@update');
    Route::middleware(['auth:sanctum', 'verified'])->post('nuevo-cumpleanios', 'CumpleaniosController@insert');
});


#HOME COURSES CONTROLLER
Route::prefix('/cursos')->group(function () {
    Route::get('/categorias', 'HomeCoursesController@home')->name('allcategories');
    Route::get('/administracion-cursos', 'HomeCoursesController@back_courses')->name('back_courses');
    Route::get('/crear-curso', 'HomeCoursesController@course_create')->name('course-create');
    Route::post('/guardar-curso', 'HomeCoursesController@save_course')->name('course-save');
    Route::get('/actualizar/{id}', 'HomeCoursesController@update_courses')->name('update-courses');
    Route::post('/guardar-actualizar', 'HomeCoursesController@save_update_courses')->name('save-update-courses');
    Route::get('/eliminar/{id}', 'HomeCoursesController@delete_courses')->name('delete-courses');
    Route::get('/{id}/{name}', 'HomeCoursesController@view_course')->name('view-course');
    Route::get('/categorias/de/{categoria}', 'HomeCoursesController@category_btn_page')->name('category-page-btn');
});

Route::prefix('/categoria-cursos')->group(function () {
    Route::get('/cursos', 'HomeCoursesController@category_courses_site')->name('category-courses-site');
    Route::get('/crear', 'HomeCoursesController@category_create')->name('create-category-courses');
    Route::post('/guardar', 'HomeCoursesController@save_category_courses')->name('save-category-courses');
    Route::get('/eliminar/{id}', 'HomeCoursesController@delete_category_courses')->name('delete-category-courses');

    Route::get('/actualizar/{id}', 'HomeCoursesController@update_category_courses')->name('update-category-courses');
    Route::post('/guardar-actualizar', 'HomeCoursesController@save_update_category_courses')->name('save-update-category-courses');
});

Route::prefix('/panel-suscriptores')->group(function () {
    Route::get('/suscripcion/data/{user}/{course}', 'HomeCoursesController@suscription')->name('suscription');
    Route::get('/usuarios', 'HomeCoursesController@suscriptores')->name('suscriptores');

});

#GOOGLE LOGIN
Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

