<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{

	public function index(){
        $sliders = Slider::orderBy('id', 'DESC')->paginate();
        //return view('slider', compact('sliders'));
    	return view('pagina', compact('sliders'));
        //return view('pagina');
    }

}
