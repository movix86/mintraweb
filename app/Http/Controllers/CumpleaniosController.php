<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cumpleanios;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AdminCumpleanios;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class CumpleaniosController extends Controller
{
    /*LOGICA CUMPLEANEROS*/
    public function index()
    {
    	$cumpleanios = Cumpleanios::orderBy('id', 'Desc')->Paginate(5);
    	return view('cumpleanios', ['cumpleanios' => $cumpleanios]);
    }

    public function destroy($id) {
    	$eliminarCumpleanero = Cumpleanios::find($id);
    	$eliminarCumpleanero->delete();
    	return redirect('cumpleanios/cumpleanios');
    }

    public function insertFile(Request $request) {
        //dd($request->all());
        $image = $request->file('file');
        $image_name = $image->getClientOriginalName();
        //echo "nombre".$image_name;
        Storage::disk('public')->put($image_name, File::get($image));

        $fp = fopen("../storage/app/public/".$image_name, "r");
        while (!feof($fp)) {
            $linea = fgets($fp);
            //$separador= explode(",", $linea);
            list($vacio,$apellidoUno,$apellidoDos,$nombre,$dia,$mes) = explode(",", $linea);
            echo "$apellidoUno <br>";
            echo "$apellidoDos <br>";
            echo "$nombre <br>";
            echo "$dia <br>";
            echo "$mes <br>";

            $nombreCompleto = $nombre." ".$apellidoUno." ".$apellidoDos;

            $cumpleanios = DB::table('cumpleanios')->insert([
            'nombre' => $nombreCompleto,
            'dia' => $dia,
            'mes' => $mes,
            ]);

        }
        fclose($fp);

    }

    public function insert(Request $request) {
        $image = $request->file('file');
        $cumpleanios = new Cumpleanios();

        if (is_null($image)) {

        } else {
            $image_name = $image->getClientOriginalName();
            Storage::disk('public')->put($image_name, File::get($image));

            /*Insert a base de datos*/
            $cumpleanios->img = $image_name;
        }
        /*Insert a base de datos*/
        $cumpleanios->nombre = $request->input('inputnombre');
        $datosFecha = explode('-', $request->input('inputfecha'));
        $cumpleanios->dia = $datosFecha[2];
        $cumpleanios->mes = $datosFecha[1];
        $cumpleanios->save();

        return redirect('/cumpleanios/cumpleanios');
    }

    public function update(Request $request) {
    	$input_ids = $request->input('btn-actualizar');

    	$actualizarCumple = Cumpleanios::find($input_ids);
    	$actualizarCumple->nombre = $request->input('updatename'.$input_ids);
    	$obtenerFecha = $request->input('updatefecha'.$input_ids);

        if (!is_null($obtenerFecha)) {
            $datos = explode('-', $obtenerFecha);
            $actualizarCumple->dia = $datos[2];
            $actualizarCumple->mes = $datos[1];
        }

        $actualizarCumple->save();
    	return redirect('/cumpleanios/cumpleanios');
    }

    /*ADMINISTRADORES DE CUMPLEANIOS*/
    /**
    * 1. Con Auth::id() sabemos si el usuario esta logeado y el id
    *2.
    *NO ESTA LOGUEADO entonces se dirigirá al login
    *SI ESTA LOGUEADO entonces :
    *1. Buscara el usuario que tiene ese id, si tiene los correos de los responsables de crear personas y usuarios pueden ingresar a crear, editar personas
    */
    public function indexAdminCumpleanios(){
        $id = Auth::id();
        if ($id == 0 || is_null($id) ) {
            return redirect()->route('login');
        } else {
            $user = User::find($id);
            $emailLogin = $user->email;
            #LA PERSONA AUTENTICADA PUEDE MODIFICAR LOS CUMPLEAÑOS
            if (Auth::check()) {
            #if ($emailLogin == 'analistaweb@uniagustiniana.edu.co'||$emailLogin == 'webmaster@uniagustiniana.edu.co') {
                $admins = AdminCumpleanios::orderBy('id', 'asc')->get();
                return view('admincumpleanios', compact('admins'));
            } else {
                echo "No tiene permisos necesarios. Por favor comuniquese con los administradores";
            }
        }
    }

    public function createAdmin(Request $request) {
        $name = $request->name;
        $correo = $request->correo;

        if (is_null($correo)) {
            echo "Por favor agregue un valor para el correo ";
        }
        if (is_null($name)) {
            echo "<br>Por favor agregue un valor para el nombre del usuario ";
        } else {
            if (str_contains($correo, '@uniagustiniana.edu.co')) {
                $admin = new AdminCumpleanios();
                $admin->nombre = $name;
                $admin->correo = $correo;
                $admin->save();
                return redirect('cumpleanios/admin-cumpleanios');
            } else {
                echo "El correo debe tener: @uniagustiniana.edu.co";
            }
        }
    }

    public function destroyAdminCumple($id){
        $adminEliminar = AdminCumpleanios::find($id);
        $adminEliminar->delete();
        return redirect('cumpleanios/admin-cumpleanios');
    }

    public function updateAdminCumple(Request $request) {
        $input_ids = $request->input('btn-actualizar');

        $consulta = AdminCumpleanios::find($input_ids);
        $consulta->nombre = $request->input('updatename'.$input_ids);
        $consulta->correo = $request->input('updatecorreo'.$input_ids);
        $consulta->save();
        return redirect('cumpleanios/admin-cumpleanios');
    }



}
