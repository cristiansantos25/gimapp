<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionsController extends Controller
{

    public function index(){
        $nombre = Auth::user();
        $cliente = DB::table('clientes')->where('Correo_Cliente',$nombre->email)->first();

        
        return view('perfil.cliente', ['cliente'=> $cliente]);
    }

    public function create(){
        return view('auth.login');
    }

    public function store() {
        $credentials = request()->only('email', 'password');

        if(auth()->attempt($credentials)){
            request()->session()->regenerate();

            return redirect('perfil');
        }else{
            return back() -> withErrors([
                'message' => 'Correo o contraseña incorrectos, intente de nuevo'
            ]);
        }

    }

    public function destroy() {
        auth() -> logout();

        return redirect() -> to('/');
    }

    public function recuperarContrasena(){
        return view('auth.recuperacion_contrasena');
    }

    public function enviarNuevaContrasena(Request $request){
        $validaData = $request->validate([
            'email' => 'required|email|comfirmed'
        ]);

        return redirect('auth.login');
    }
}
