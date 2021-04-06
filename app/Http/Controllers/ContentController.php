<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\News;

class ContentController extends Controller
{

    public function create_news(){

        return view('create_news');
    }
    public function save_news(Request $data){
        #GUARDA DATOS DE SLIDER EXISTENTE
        $validate = $this->validate($data, [
            'news_name' => 'max:255',
            'url_path_image_news' => 'max:255'
        ]);
        #Captura ruta de la imagen
        $image_path = $data->file('url_path_image_news');


        #Crea la noticia
        $news = new News;
        $news->news_name = $data->input('news_name');
        $news->code_block = $data->input('code_block');
        $news->category = 'Noticias';
        $news->user_id = Auth::user()->id;


        //Verifica y configura el fichero o imagen
        if($image_path){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('public')->put($image_path_name, File::get($image_path));
            $news->url_path_image_news = asset('storage') . '/' . $image_path_name;
        }else{
            $news->url_path_image_news = asset('img') . '/1616191535image-default.jpg';
        }
        $news->save();
        return back()->with('success','Se guardo la noticia con exito!');

    }

    public function read_news(){
        return view('home.front-noticia');
    }
    public function update_news(){

    }
    public function delete_news(){

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
