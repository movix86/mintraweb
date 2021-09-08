<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MediosController extends Controller
{
    public function index(){}
    public function show_medios(){
        //print_r("asigna permisos");exit;
        $thefolder = "storage/medios/";
       // $thefolder = storage_path();
        //print_r($thefolder);exit;
        $files = [];
        $tamaños = [];
        $obj = [];

        if (!file_exists($thefolder)) {
            mkdir($thefolder, 0777, true);
        }

        if ($gestor = opendir($thefolder)) {
            while(false !== ($archivo = readdir($gestor))){
                if ($gestor != '.' && $archivo != '..') {
                    //echo $archivo."<br/>";
                    if ($archivo !== '.gitignore' && $archivo !== '.') {
                        $files[]= $archivo;

                        //$obj[]= readfile($archivo);
                        //$tamaños[]= filesize($archivo);

                    }
                }
            }

            $lista = [
                'archivos' => $files,
                'tamaños' => $tamaños
            ];

        }
         return view('medios', ['archivos' => $files]);
    }



    public function subir_medio(Request $data){
        #GUARDA DATOS DE SLIDER EXISTENTE
        $validate = $this->validate($data, [
            'file-all' => 'mimes:jpeg,bmp,png,gif,svg,pdf|file|max:3000'
        ]);
        $file_path = $data->file('file-all');
        //Subir fichero
        if($file_path){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name = 'medios/' . date("dmYGis").$file_path->getClientOriginalName();
            Storage::disk('public')->put($image_path_name, File::get($file_path));
            #$slider->url_path_image = asset('storage') . '/' . $image_path_name;
        }

        return back()->with('success','Se guardo el archivo!');
    }







}
