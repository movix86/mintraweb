<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    public function dashboard_c(){
        $usuarios = User::all();
        return view('dashboard', ['usuarios' => $usuarios]);
    }
    public function modificar_usuario($id){
        $usuario = User::find($id);
        return view('home.modificar-usuario', ['usuario' => $usuario]);
    }
    public function actualizar_usuario(Request $data){
        $usuario = User::find($data->input('id'));
        $usuario->name = $data->input('name');
        $usuario->lastname = $data->input('lastname');
        $usuario->email = $data->input('email');
        if (!is_null($data->input('password'))) {
            $usuario->password = Hash::make($data->input('password'));
        }
        $usuario->save();

        return redirect('dashboard');
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
