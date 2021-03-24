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
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $sliders_list = Sliders::orderBy('id', 'desc')->paginate();

            #Este asigna un slider-predeterminado:
            $sliders_num = $sliders_list->count();
            if ($sliders_num < 1) {
                $slider = new Sliders;
                $slider->name = 'Nombre de slider, que se usara como titulo';
                $slider->url_path_image =  asset('img') . '/1616191535image-default.jpg';
                $slider->url_news = '';
                $slider->user_id = $id_user;
                $slider->save();
                return back()->with('success','Slider Default!');
            }
            return view('home.admin-sliders', ['sliders' => $sliders_list]);
        }else{
            return redirect('login');
        }
    }

    public function crear_sliders(){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            #CREA UN SLIDER NUEVO Y DEJA ESTOS DATOS PREDETERMINADOS
            $slider = new Sliders;
            $slider->name = 'Nombre de slider, que se usara como titulo';
            $slider->url_path_image =  asset('img') . '/1616191535image-default.jpg';
            $slider->url_news = '';
            $slider->user_id = $id_user;
            $slider->save();

            return back()->with('success','Slider creado con exito!');
        }else{
            return redirect('login');
        }
    }
    public function eliminar_sliders($id){
        $id_slider = $id;
        $slider_select = Sliders::find($id);
        $slider_select->delete();

        return back()->with('success','Slider eliminado con exito!');
    }

    public function guardar_slider(Request $image){
        #GUARDA DATOS DE SLIDER EXISTENTE
        $validate = $this->validate($image, [
            'name-slider' => 'max:255',
            'url' => 'max:255'
        ]);
        $image_path = $image->file('file-slider');
        #Captura los ids a modificar
        $user = Auth::user()->id;
        $slider_id = $image->input('id_slider');

        #BUSCA EL SLIDER POR EL ID Y LO MODIFICA
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
            $slider->url_path_image = asset('storage') . '/' . $image_path_name;
        }
        $slider->save();
        return back()->with('success','Slider Actualizado con exito!');
    }
}
