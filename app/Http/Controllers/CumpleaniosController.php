<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CumpleaniosController extends Controller
{
    public function index(){
    	$id = Auth::id();
    	echo $id;
    	die();

    	return view('editorCumpleanios');
    }
}
