<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediosController extends Controller
{
    public function show_medios(){
        $thefolder = "img/";
        $files = [];
        $tamaños = [];
        $obj = [];
        if ($gestor = opendir($thefolder)) {

            while(false !== ($archivo = readdir($gestor))){
                if ($gestor != '.' && $archivo != '..') {
                    //echo $archivo."<br/>";
                    if ($archivo !== '.gitignore' && $archivo !== '.') {
                        $files[]= $archivo;
                        /*
                        $obj[]= readfile($archivo);
                        $tamaños[]= filesize($archivo);
                        */
                    }
                }
            }

            $lista = [
                'archivos' => $files,
                'tamaños' => $tamaños
            ];

            return view('medios', ['archivos' => $files]);
        }

    }

    public function subir_medio(){

    }



}
