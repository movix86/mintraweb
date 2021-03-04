<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
	/**
	<b>Precondiciones:</b> Traer el modelo Slider
	<b>Poscondiciones:</b> Dos consultas a base de datos: 
	consulta1 ($sliders): Ordena los sliders por id, de manera desendente
	consulta2 ($oneSlider): Traer el id mas pequeño, 
	despues hace la consulta para traer todos los datos de ese id
	
	return view pagina y con ella 2 consultas a base de datos
	*/
	public function index(){
        
       // @componenteSlider(['type' => $sliders ]);
    	return view('pagina');
    }

}
