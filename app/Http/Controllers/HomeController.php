<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserFormValidator;

use App\Models\User;
use App\Models\Team;
use App\Models\Sliders;
use App\Models\News;

class HomeController extends Controller
{
    public function index(){
        #1. Este asigna un usuario predeterminado al systema y el primer slider:
        $num_user_list = User::all();
        $num_user = $num_user_list->count();
        if ($num_user  < 1) {
            User::create([
                'name' => 'system',
                'lastname' => 'system',
                'email' => 'system@system.com',
                'password' => Hash::make('system'),
            ]);
            $user = User::where('id', '=', 1)->first();
            $user->ownedTeams()->save(Team::forceCreate([
                'user_id' => $user->id,
                'name' => explode(' ', $user->name, 2)[0]."'s Team",
                'personal_team' => true,
            ]));
        }
        return view('auth.login');
    }
    public function home(){
        $sliders_query = Sliders::orderBy('id', 'desc')->paginate();
        $sliders = [];

        #2. Este asigna un slider-predeterminado al HOME:
        $sliders_list = Sliders::all();
        $sliders_num = $sliders_list->count();
        if ($sliders_num < 1) {
            $slider = new Sliders;
            $slider->name = 'Nombre de slider, que se usara como titulo';
            $slider->url_path_image =  asset('img') . '/1616191535image-default.jpg';
            $slider->url_news = '';
            $slider->user_id = 1;
            $slider->save();
        }

        #3. Envia los datos a la vista home->sdmin-slider para que se puedan ver:
        foreach ($sliders_query as $obj_sliders) {
            $sliders [] = $obj_sliders;
        }
        return view('home.home', ['sliders' => $sliders]);
    }


    public function dashboard_c($tipo = '', $categoria = ''){
        $filter = [
            'tipo' => $tipo,
            'categoria' => $categoria
        ];
        $data = '';
        #var_dump($filter);
        if ($filter['tipo'] == '' && $filter['categoria'] == '') {
            $data = News::all();
        }elseif($filter['tipo'] == 'todas' && $filter['categoria'] == 'todas'){
            $data = News::all();
        }elseif($filter['tipo'] !== '' && $filter['categoria'] == 'todas'){

            $data = News::where([['type', $filter['tipo']]])->get();

        }elseif($filter['tipo'] == 'todas' && $filter['categoria'] !== ''){

            $data = News::where([['category', $filter['categoria']]])->get();

        }elseif($filter['tipo'] !== '' && $filter['categoria'] !== ''){

            $data = News::where([['type', $filter['tipo']], ['category', $filter['categoria']]])->get();
        }

        $data_filter = [
            'tipo' => $filter['tipo'],
            'categoria' => $filter['categoria'],
            'data' => $data
        ];

        return view('dashboard', ['data_filter' => $data_filter]);
    }






    public function usuarios_c(){
        $usuarios = User::all();
        return view('usuarios', ['usuarios' => $usuarios]);
    }
    #MIDDLEWARE MODIFICAR
    public function modificar_usuario($id){
        $usuario = User::find($id);
        if(Auth::check()){
            if (Auth::user()->id == $id) {
                return redirect("/user/profile");
            }else{
                return view('home.modificar-usuario', ['usuario' => $usuario]);
            }
        }else{
            return redirect('login');
        }
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
        return back()->with('success','Usuario actualizado con exito!');
    }
    #MIDDLEWARE MODIFICAR
    public function crear_usuario(){
        if(Auth::check()){
            return view('home.modificar-usuario');
        }else{
            return redirect('login');
        }
    }
    public function guardar_usuario(Request $data, UserFormValidator $validador){

        DB::transaction(function () use ($data) {
            tap(User::create([
                'name' => $data->input('name'),
                'lastname' => $data->input('lastname'),
                'email' => $data->input('email'),
                'password' => Hash::make($data->input('password')),
            ]), function (User $user) {
                $this->createTeam($user);
            });

        });
        return back()->with('success','Usuario creado con exito!');

    }
    #CREA EL EQUIPO DEL USUARIO PARA EVITAR EL ERROR
    public function createTeam(User $user){
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }

}
