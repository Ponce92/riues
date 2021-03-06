<?php

namespace App\Http\Controllers;

use App\Http\Requests\editarUsuarioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;



class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verUsuario(Request $request)
    {

        $user=Auth::user();

        return view('gestionUsuario')->with('user',$user);
    }

    public function actualizarUsuario(editarUsuarioRequest $request)
    {
        $viejoPassword=$request->get('viejoPassword');
        $user=Auth::user();

        if(Hash::check($viejoPassword,Auth::user()->getAuthPassword())){
            $clave= $request->get('password');
            $confirm=$request->get('password_confirmation');
            if($clave == $confirm)
            {
                $estado="Sus datos han sido actualizados correctamente.";
                $user->password=Hash::make($clave);
                $user->save();


                return view('gestionUsuario')->with('user',$user)
                                                  ->with('estado',$estado);


            }else
                {
                    $err1='Sus credenciales son incorrectas';

                    return view('gestionUsuario')->with('user',$user)
                                                      ->withErrors(['password_confirmation'=>'La nuevas credenciales concuerdan.']);
                }
        }else{

            return view('gestionUsuario')->with('user',$user)
                                              ->withErrors(['viejoPassword'=>'Su contraseña es incorrecta.']);
        }

    }
}
