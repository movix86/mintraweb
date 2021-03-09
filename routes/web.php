<?php

use Illuminate\Support\Facades\Route;
//use App\Models\Slider;

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

/*
Route::get('/', function () {
    return view('pagina');
});
*/

Route::get('/', 'HomeController@index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['prefix' => 'home'], function () {
    Route::get('index', 'HomeController@index');
});

Route::get('/pruebaListar', 'SliderController@index');

Route::get('/slider', 'SliderController@index2');

Route::get('/eliminarSlider1/{id}', 'SliderController@destroy');

Route::get('/eliminarSlider', function() {
	$data['total'] = 20;
	echo "HIHI";

	return view('file', $data);
});

Route::get('/insertSlider', function () {
	/*Insertar nuevo slider*/	
	$insertSlider = \DB::table('slider')->insert([
		//'id' => '2',
		'descripcion' => '$request->etiquetaAlt',
		'direccion' => '$image_name',
	]);
});

Route::get('/test', 'SliderController@indexSlider');

Route::post('file', 'SliderController@insertarSlider');

Route::post('slider-update', 'SliderController@update');

Route::get('/admin-cumpleanios', 'AdminCumpleaniosController@index');

//Route::get('/cumpleanios', '')

/*
Route::post('file', function(Illuminate\Http\Request $request) {

	//dd($request->all());
	$image = $request->file('file');
	if (is_null($image)) {
		echo "Debe incluir una imagen";
	} else {
		$image_name = $image->getClientOriginalName();
		//echo "nombre".$image_name;
	    Storage::disk('public')->put($image_name, \File::get($image));

	    //echo "slider elegido:" . $request->sliderElejido;
	    $nameSlider = $request->sliderElejido;

	    if ($nameSlider == 'Slider 1') {
			$numberSlider = 1;     	
	    }
	    else if ($nameSlider == 'Slider 2') {
			$numberSlider = 2;     	
	    }
	    else if ($nameSlider == 'Slider 3') {
			$numberSlider = 3;     	
	    }

	    $alt = $request->etiquetaAlt;
	    
	    if (is_null($alt) || is_null($image)) {
	    	echo "Por favor escriba algo para la etiquetaAlt, no puede ser null";
	    } else {
		    $consulta = Slider::find($numberSlider);
		    $consulta->descripcion = $alt;
		    $consulta->direccion = $image_name; 
		    $consulta->save();
		    return 'Guardado Exitoso!';
		}

		/*Insertar nuevo slider*/
		/*
		$insertSlider = \DB::table('slider')->insert([
			'id' => $numberSlider,
			'descripcion' => $request->etiquetaAlt,
			'direccion' => $image_name,
		]);
		*/
	    
		
		//return view('file');		
/*
	}
    
});
*/