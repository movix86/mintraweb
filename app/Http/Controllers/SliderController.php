<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Storage;

class SliderController extends Controller
{
    public function index() {
    	$sliders = Slider::orderBy('id', 'DESC')->paginate();
    	return view('listarSliders', compact('sliders'));
    }

    public function index2() {
    	$sliders = Slider::orderBy('id', 'DESC')->paginate();
    	return view('file', compact('sliders'));
    }

    public function destroy($id) {
    	$sliders = Slider::find($id);
    	$sliders->delete();
    	echo "Slider eliminado";

    	return redirect('pruebaListar');
    }

    public function insertarSlider(Request $request) {
        //echo "slider elegido:" . $request->sliderElejido;

        $etiquetaAlt = $request->etiquetaAlt;

        $image = $request->file('file');
        if (is_null($image)) {
            echo "Debe incluir una imagen";
        } else {
            $image_name = $image->getClientOriginalName();
            //echo "nombre".$image_name;
            \Storage::disk('public')->put($image_name, \File::get($image));

            $data['etiquetaAlt'] = $request->etiquetaAlt;
            $data['direccion'] = $image_name;

            $alt = $request->etiquetaAlt;
            
            if (is_null($alt) || is_null($image)) {
                echo "Por favor escriba algo para la etiquetaAlt, no puede ser null";
            } else {
                echo "estoy en controller line 38";
                $slider = new Slider();
                $slider->descripcion = $alt;
                $slider->direccion = $image_name; 
                $slider->save();
                return 'Guardado Exitoso!';
            }
        }
	}
}
