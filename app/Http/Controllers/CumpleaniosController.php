<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cumpleanios;

class CumpleaniosController extends Controller
{
    public function index()
    {	
    	$cumpleanios = Cumpleanios::orderBy('id', 'ASC')->paginate(2);
    	return view('cumpleanios', compact('cumpleanios'));
    }

    public function destroy($id) {
    	$eliminarCumpleanero = Cumpleanios::find($id);
    	$eliminarCumpleanero->delete();
    	return redirect('/cumpleanios');
    }

    public function test($mes){
    	if ($mes==1) {
    		$mes = "Enero";
    	} elseif ($mes==2) {
    		$mes = "Febrero";
    	} elseif ($mes==3) {
    		$mes = "Marzo";
    	} elseif ($mes==4) {
    		$mes = "Abril";
    	} elseif ($mes==5) {
    		$mes = "Mayo";
    	} elseif ($mes==6) {
    		$mes = "Junio";
    	} elseif ($mes==7) {
    		$mes = "Julio";
    	} elseif ($mes==8) {
    		$mes = "Agosto";
    	} elseif ($mes==9) {
    		$mes = "Septiembre";
    	} elseif ($mes==10) {
    		$mes = "Octubre";
    	} elseif ($mes==11) {
    		$mes = "Noviembre";
    	} elseif ($mes==12) {
    		$mes = "Diciembre";
    	}

    	return $mes;
    }

    public function insert(Request $request) {
        
        $image_name = $image->getClientOriginalName();
        \Storage::disk('public')->put($image_name, \File::get($image));

        if (is_null($image)) {
            echo "Por favor agregue una imagen, no puede ser null";
        } else {
            $cumplanios = new Cumpleanios();
            $cumplanios->nombre = $request->input('inputnombre');
            $cumplanios->fecha = $request->input('inputfecha');
            $cumplanios->img = $image_name;
            $cumplanios->save();
            return 'Guardado Exitoso!';
        }
    }

    public function update(Request $request) {
    	$input_ids = $request->input('btn-actualizar');

    	$consulta = Cumpleanios::find($input_ids);
    	$consulta->nombre = $request->input('updatename'.$input_ids);
    	$fechaActualizada = $consulta->fecha = $request->input('updatefecha'.$input_ids);

    	$datos = explode('-', $fechaActualizada);
    	$mes = $datos[1];
    	$dia = $datos[2];

    	if ($mes==1) {
    		$mes = "Enero";
    	} elseif ($mes==2) {
    		$mes = "Febrero";
    	} elseif ($mes==3) {
    		$mes = "Marzo";
    	} elseif ($mes==4) {
    		$mes = "Abril";
    	} elseif ($mes==5) {
    		$mes = "Mayo";
    	} elseif ($mes==6) {
    		$mes = "Junio";
    	} elseif ($mes==7) {
    		$mes = "Julio";
    	} elseif ($mes==8) {
    		$mes = "Agosto";
    	} elseif ($mes==9) {
    		$mes = "Septiembre";
    	} elseif ($mes==10) {
    		$mes = "Octubre";
    	} elseif ($mes==11) {
    		$mes = "Noviembre";
    	} elseif ($mes==12) {
    		$mes = "Diciembre";
    	}

    	$consulta->fecha = $dia.' de '.$mes;
        $consulta->save();

    	return redirect('/cumpleanios');
    }
}
