<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    public function dashboard_c(){
        $usuarios = User::all()->first();
        return view('dashboard', ['usuarios' => $usuarios]);
    }
    public function crear_noticia(){

        return view('home.crear-noticia');
    }
    public function guardar_noticia(){


    }
    public function mostrar_noticia(){

        return view('home.front-noticia');
    }
}
