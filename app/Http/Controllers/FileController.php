<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Sliders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    public function admin_sliders(){
        $id_user = Auth::user()->id;
        $sliders_list = Sliders::all();

        #Este asigna un slider-predeterminado:
        $sliders_num = $sliders_list->count();
        if ($sliders_num < 1) {
            $slider = new Sliders;
            $slider->name = 'Nombre de slider, que se usara como titulo';
            $slider->url_path_image =  '1616191535image-default.jpg';
            $slider->url_news = '';
            $slider->user_id = $id_user;
            $slider->save();
            return back()->with('success','Slider Default!');
        }
        return view('home.admin-sliders', ['sliders' => $sliders_list]);
    }

    public function crear_sliders(){
        $id_user = Auth::user()->id;

        $slider = new Sliders;
        $slider->name = 'Nombre de slider, que se usara como titulo';
        $slider->url_path_image =  'img/image-default.jpg';
        $slider->url_news = '';
        $slider->user_id = $id_user;
        $slider->save();

        return back()->with('success','Slider creado con exito!');
    }
    public function eliminar_sliders($id){
        $id_slider = $id;
        $slider_select = Sliders::find($id);
        $slider_select->delete();

        return back()->with('success','Slider eliminado con exito!');
    }

    public function guardar_slider(Request $image){
        $validate = $this->validate($image, [
            'name-slider' => 'required',
            'url' => 'required'
        ]);
        $image_path = $image->file('file-slider');

        #Captura los ids a modificar
        $user = Auth::user()->id;
        $slider_id = $image->input('id_slider');

        #Busca los ids a modificar
        $slider = Sliders::find($slider_id);
        $slider->name = $image->input('name-slider');
        #$slider->url_path_image = $image->file('file-slider');
        $slider->url_news = $image->input('url');
        $slider->user_id = $user;

        //Subir fichero
        if($image_path){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('public')->put($image_path_name, File::get($image_path));
            $slider->url_path_image = $image_path_name;
        }
        $slider->save();
        return back()->with('success','Slider Actualizado con exito!');
    }
}
