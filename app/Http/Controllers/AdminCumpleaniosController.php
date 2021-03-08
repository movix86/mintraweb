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

    		$admin = AdminCumpleanios::orderBy('id', 'DESC')->paginate();
    		
    		return view('admincumpleanios');
    	}    	
    }
}
