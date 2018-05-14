<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['only'=>'ShowLoginForm']);

    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this -> validate(request(),[
            'usuario'=> 'required|string|max:25|min:4',
            'password' => 'required|string|min:6'
        ]);

        if (Auth::attempt(['nombre_usuario'=>$request->get('usuario'),'password'=>$request->get('password')])){
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['ss'=>'Credenciales incorrectas'])
            ->withInput(request(['usuario']));

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function NombreUsuario(){
        return 'nombre_usuario';
    }

}
