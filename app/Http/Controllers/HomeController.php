<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function crear_noticia(){

        return view('home.crear-noticia');
    }
    public function guardar_noticia(){


    }
    public function mostrar_noticia(){

        return view('home.front-noticia');
    }
}
