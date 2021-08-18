<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CoursesFormValidator;
use App\Http\Requests\CategoryCoursesFormValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\Courses;
use App\Models\CategoryCourses;

class HomeCoursesController extends Controller
{
    public function home(){
        $cursos = CategoryCourses::all();
        return view('home.home_courses', ['cursos' => $cursos]);
    }
    public function back_courses(){
        return view('courses.courses-back');
    }

    public function course_create(){
        $category = CategoryCourses::all('name');
        return view('courses.page-form-courses', ['category' => $category]);
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
            $course->url_path_image_course = asset('img') . '/cursos/banner-cursos-default.jpg';
        }
        if($image_path_btn){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name_btn = time().$image_path_btn->getClientOriginalName();
            Storage::disk('public')->put($image_path_name_btn, File::get($image_path_btn));
            $course->url_path_image_course_btn = asset('storage') . '/' . $image_path_name_btn;
        }else{
            $course->url_path_image_course_btn = asset('img') . '/cursos/btn-default.png';
        }
        $course->save();
        return back()->with('success','Se creo el curso con exito!');
    }

    public function update_courses($id){
        $data_course = Courses::findOrFail($id);
        $category = CategoryCourses::all();
        $data = [
            'course_data' => $data_course,
            'category' => $category
        ];
        return view('courses.page-form-courses', ['data'=> $data]);
    }
    public function save_update_courses(Request $inputs, CoursesFormValidator $validador){

        if ($inputs->input('id')) {
            $course = Courses::findOrFail($inputs->input('id'));
        }
            #Captura ruta de la imagen
            $image_path = $inputs->file('url_path_image_course');
            $image_path_btn = $inputs->file('url_path_image_course_btn');

            #Crea la noticia
            $course->name = $inputs->input('name');
            $course->description = $inputs->input('description');
            #$course->tittle_activation = $inputs->input('tittle_activation');
            $course->code_block = $inputs->input('code_block');
            #$course->type = $inputs->input('type');
            $course->category = $inputs->input('category');
            $course->user_id = Auth::user()->id;


        //Verifica y configura el fichero o imagen
        if($image_path !== NULL){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('public')->put($image_path_name, File::get($image_path));
            $course->url_path_image_course = asset('storage') . '/' . $image_path_name;
        }
        if($image_path_btn !== NULL){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name_btn = time().$image_path_btn->getClientOriginalName();
            Storage::disk('public')->put($image_path_name_btn, File::get($image_path_btn));
            $course->url_path_image_course_btn = asset('storage') . '/' . $image_path_name_btn;
        }
        $course->save();
        return back()->with('success','Se actualizo el curso con exito!');
    }

    public function delete_courses($id){
        $course = Courses::findOrFail($id);
        $course->delete();
        return back()->with('success','Se elimino el curso con exito!');
    }

    public function category_courses_site(){
        return view('components.courses-components.category-courses-site');
    }

    public function category_create(){
        return view('courses.page-form-category');
    }
    public function save_category_courses(Request $inputs_category, CategoryCoursesFormValidator $validador){
        #Captura ruta de la imagen
        $image_path_btn = $inputs_category->file('url_path_image_category_btn');

        #Crea la noticia
        $category_course = new CategoryCourses;
        $category_course->name = $inputs_category->input('name');
        $category_course->description = $inputs_category->input('description');

        //Verifica y configura el fichero o imagen
        if($image_path_btn){
            #1 - Crea nuevo nombre del archivo con fecha al inicio
            #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
            #3 - Guarda el nombre de la url
            $image_path_name_btn = time().$image_path_btn->getClientOriginalName();
            Storage::disk('public')->put($image_path_name_btn, File::get($image_path_btn));
            $category_course->url_path_image_category_btn = asset('storage') . '/' . $image_path_name_btn;
        }else{
            $category_course->url_path_image_category_btn = asset('img') . '/cursos/btn-default.png';
        }
        $category_course->save();
        return back()->with('success','Se creo la categoria con exito!');
    }

    public function update_category_courses($id){
        $data = CategoryCourses::findOrFail($id);
        return view('courses.page-form-category', ['data' => $data]);
    }

    public function save_update_category_courses(Request $inputs_category, CategoryCoursesFormValidator $validador){

        if ($inputs_category->input('id')) {
            $category_course = CategoryCourses::findOrFail($inputs_category->input('id'));
        }
         #Captura ruta de la imagen
         $image_path_btn = $inputs_category->file('url_path_image_category_btn');
         #Crea la noticia
         $category_course->name = $inputs_category->input('name');
         $category_course->description = $inputs_category->input('description');

         //Verifica y configura el fichero o imagen
         if($image_path_btn !== NULL){
             #1 - Crea nuevo nombre del archivo con fecha al inicio
             #2 - Utiliza paquete Storage('nombre carpeta')->put(nombre-archivo, de donde obtiene el archivo)
             #3 - Guarda el nombre de la url
             $image_path_name_btn = time().$image_path_btn->getClientOriginalName();
             Storage::disk('public')->put($image_path_name_btn, File::get($image_path_btn));
             $category_course->url_path_image_category_btn = asset('storage') . '/' . $image_path_name_btn;
         }
         $category_course->save();
         return back()->with('success','Se actualizo la categoria con exito!');
    }

    public function delete_category_courses($id){
        $category_course = CategoryCourses::findOrFail($id);
        $category_course->delete();
        return back()->with('success','La categoria se elimino con exito!');
    }

    public function category_btn_page($categoria){
        if ($categoria) {
            $categoria_group = Courses::where('category','=', $categoria)->get();
        }
        return view('home.home_courses_info', ['cursos' => $categoria_group]);
    }

    public function view_course($id, $name_course){
        $find_course = Courses::findOrFail($id);

        return view('courses.front-page-courses', ['data' => $find_course]);
    }
}
