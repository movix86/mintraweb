<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AdminCumpleanios;

class AdminCumpleaniosController extends Controller
{
	/**
	1. Con Auth::id() sabemos si el usuario esta logeado y el id
	2. 
	NO ESTA LOGUEADO entonces se dirigirá al login
	SI ESTA LOGUEADO entonces : 
	1. Buscara el usuario que tiene ese id, si tiene los correos de los responsables de crear personas y usuarios pueden ingresar a crear, editar personas 

	*/
    public function index(){
    	$id = Auth::id();
    	if ($id == 0 || is_null($id) ) {
    		return redirect()->route('login');
    	} else {
    		$user = User::find($id);
    		$emailLogin = $user->email;
			if ($emailLogin == 'analistaweb@uniagustiniana.edu.co'||$emailLogin == 'webmaster@uniagustiniana.edu.co'  ) {
				$admins = AdminCumpleanios::orderBy('id', 'asc')->get();
				return view('admincumpleanios', compact('admins'));
			} else {
				echo "No tiene permisos necesarios. Por favor comuniquese con los administradores";				
			}
    	}    	
    }

    public function create(Request $request) {
    	$name = $request->name;
    	$correo = $request->correo;

    	if (is_null($correo)) {
    		echo "Por favor agregue un valor para el correo ";
    	} else {
    		if (str_contains($correo, '@uniagustiniana.edu.co')) {
    			$admin = new AdminCumpleanios();
	    		$admin->nombre = $name;
	    		$admin->correo = $correo;
	        	$admin->save();
	        	return redirect('/admin-cumpleanios');
    		} else {
    			echo "El correo debe tener: @uniagustiniana.edu.co";
    		}
    	}
    }

    public function destroy($id){
    	$adminEliminar = AdminCumpleanios::find($id);
    	$adminEliminar->delete();
    	return redirect('/admin-cumpleanios');
    }

    public function update(Request $request) {
    	$input_ids = $request->input('btn-actualizar');

    	$consulta = AdminCumpleanios::find($input_ids);
    	$consulta->nombre = $request->input('updatename'.$input_ids);
    	$consulta->correo = $request->input('updatecorreo'.$input_ids);
        $consulta->save();
    	return redirect('/admin-cumpleanios');
    }
}
