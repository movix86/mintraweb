<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsFormValidator;
use App\Http\Requests\NewsFormUpdateValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\News;
use App\Models\User;


class ContentController extends Controller
{

    public function create_page($tipo){

        return view('create_pages' ,['tipo' => $tipo]);
    }
    public function save_page(Request $data, NewsFormValidator $newsFormValidator){
        #Captura ruta de la imagen
        $image_path = $data->file('url_path_image_news');
        #Crea la noticia
        $news = new News;
        $news->news_name = $data->input('news_name');
        $news->resume = $data->input('resume');
        $news->code_block = $data->input('code_block');
        $news->type = $data->input('type');
        $news->category = $data->input('category');
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


    public function show_pages_news($filtro = ''){
         #$categoria = $category->input('c');
         if (empty($filtro)) {
             $noticias = News::where([['type', '=', 'noticias']])->orderBy('created_at', 'desc')->paginate(2);

         }else{
             $noticias = News::where([['type', '=', 'noticias'],['category', '=', $filtro]])->orderBy('created_at', 'desc')->paginate(2);
         }
         $data_filter = [
             'tipo' => 'actualidad',
             'data' => $noticias,
             'categoria' => $filtro
         ];

         return view('home.home-pages', ['data_filter'=> $data_filter]);
    }
    public function read_page_news($id, $titulo){
        $data_news = News::where('id', $id)->first();
        $user_data = User::where('id', $data_news->user_id)->first();
        $user_name = $user_data->name;

        $data = [
            'tipo' => 'actualidad',
            'data_news' => $data_news,
            '$user_name' => $user_name
        ];
        return view('home.front-page', ['data'=> $data]);
    }

    public function update_page($id){
        $data = News::where('id', $id)->first();
        return view('create_pages', ['data' => $data]);
    }
    public function save_update_page(Request $data, NewsFormUpdateValidator $newsFormUpdateValidator){

        if ($data->input('id')) {
            $news = News::where('id', $data->input('id'))->first();

        }

        #Captura ruta de la imagen
        $image_path = $data->file('url_path_image_news');
        #Crea la noticia
        $news->news_name = $data->input('news_name');
        $news->resume = $data->input('resume');
        $news->code_block = $data->input('code_block');
        $news->type = $data->input('type');
        $news->category = $data->input('category');
        $news->user_id = Auth::user()->id;
        //Verifica y configura el fichero o imagen
        if($image_path !== Null){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('public')->put($image_path_name, File::get($image_path));
            $news->url_path_image_news = asset('storage') . '/' . $image_path_name;
        }
        $news->save();
        return back()->with('success','Se actualizo la noticia con exito!');
    }
    public function delete_news(){

    }



    public function show_pages_events($filtro = ''){
        #$categoria = $category->input('c');
        if (empty($filtro)) {
            $eventos = News::where([['type', '=', 'eventos']])->orderBy('created_at', 'desc')->paginate(2);

        }else{
            $eventos = News::where([['type', '=', 'eventos'],['category', '=', $filtro]])->orderBy('created_at', 'desc')->paginate(2);
        }
        $data_filter = [
            'tipo' => 'eventos',
            'data' => $eventos,
            'categoria' => $filtro
        ];

        return view('home.home-pages', ['data_filter'=> $data_filter]);
   }
   public function read_page_event($id, $titulo){
       $data_news = News::where('id', $id)->first();
       $user_data = User::where('id', $data_news->user_id)->first();
       $user_name = $user_data->name;

       $data = [
           'tipo' => 'eventos',
           'data_news' => $data_news,
           '$user_name' => $user_name
       ];
       return view('home.front-page', ['data'=> $data]);
   }
}
