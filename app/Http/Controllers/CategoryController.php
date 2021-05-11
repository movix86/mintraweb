<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    #Muestra la vista
    public function admin_categories(){
        $data_category = Category::all();
        return view('category', ['data_category' => $data_category]);
    }

    public function create_category(){
        return view('page-form-category');
    }

    public function save_category(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $Category = new Category;
        $Category->name = $request->input('name');
        $Category->description = $request->input('description');
        $Category->save();
        return back()->with('success','Categoria guardada con exito!');

    }

    public function edit_category($id){
        $data_category = Category::where('id', $id)->first();
        return view('page-form-category', ['data_category' => $data_category]);
    }

    public function save_update_category(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'max:255',
        ]);
        $id = $request->input('id');
        $Category = Category::where('id', $id)->first();
        $Category->name = $request->input('name');
        $Category->description = $request->input('description');
        $Category->save();
        return back()->with('success','Categoria actualizada con exito!');
    }

    public function delete_category($id){
        $category = Category::where('id', $id)->first();
        $category->delete();
        return back()->with('success','Categoria se elimino con exito!');
    }
}
