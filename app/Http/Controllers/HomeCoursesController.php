<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CoursesFormValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\Courses;

class HomeCoursesController extends Controller
{
    public function home(){
        return view('home.home_courses');
    }
    public function back_courses(){
        return view('courses.courses-back');
    }

    public function course_create(){
        return view('courses.page-form-courses');
    }

    public function save_course(Request $inputs, CoursesFormValidator $validador){
        #Captura ruta de la imagen
        $image_path = $inputs->file('url_path_image_course');
        $image_path_btn = $inputs->file('url_path_image_course_btn');

        #Crea la noticia
        $course = new Courses;
        $course->name = $inputs->input('name');
        $course->description = $inputs->input('description');
        #$course->tittle_activation = $inputs->input('tittle_activation');
        $course->code_block = $inputs->input('code_block');
        #$course->type = $inputs->input('type');
        $course->category = $inputs->input('category');
        $course->user_id = Auth::user()->id;

        //Verifica y configura el fichero o imagen
        if($image_path){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('public')->put($image_path_name, File::get($image_path));
            $course->url_path_image_course = asset('storage') . '/' . $image_path_name;
        }else{
            $course->url_path_image_course = asset('img') . '/banner-news-default.jpg';
        }
        if($image_path_btn){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name_btn = time().$image_path->getClientOriginalName();
            Storage::disk('public')->put($image_path_name_btn, File::get($image_path));
            $course->url_path_image_course = asset('storage') . '/' . $image_path_name_btn;
        }else{
            $course->url_path_image_course = asset('img') . '/banner-news-default.jpg';
        }
        $course->save();
        return back()->with('success','Se creo el curso con exito!');
    }
}
