<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Exception;
use App\Models\User;
use App\Models\Team;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/dashboard');

            }else{
                /*
                $newUser = User::create([
                    'name' => $user->name,
                    'lastname' => 'lastname',
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                */
                $newUser = [
                    'name' => $user->name,
                    'lastname' => 'lastname',
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => 'uniagustiniana'
                ];
                DB::transaction(function () use ($newUser) {
                    tap(User::create([
                        'name' => $newUser['name'],
                        'lastname' => 'lastname',
                        'email' => $newUser['email'],
                        'google_id'=> $newUser['google_id'],
                        'password' => Hash::make($newUser['password']),
                    ]), function (User $user) {
                        $this->createTeam($user);
                        Auth::login($user);
                    });

                });

                #Auth::login($newUser);

                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
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
