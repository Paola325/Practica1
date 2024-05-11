<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cookie;
use App\Models\Usuario;

class LoginController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function valida(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si las credenciales son válidas, redirigir al usuario según su rol
            $user = Auth::user();
            return redirect()->route($user->role); // Redirigir según el rol del usuario
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }

    public function logout(){
        Auth::logout();
        Cookie::forget('laravel_session');
        return redirect()->to('/');
    }

    public function restriccionCliente(){
        if (Auth::user()->role !== 'cliente') {
            return redirect()->route('login');
        }
        return view('cliente');
    }
    
    public function restriccionContador(){
        if (Auth::user()->role !== 'contador') {
            return redirect()->route('login');
        }
        return view('contador');
    }
    
    public function restriccionEncargado(){
        if (Auth::user()->role !== 'encargado') {
            return redirect()->route('login');
        } 
        return view('encargado');
    }

    public function restriccionSupervisor()
    {
        if (Auth::user()->role !== 'supervisor') {
            return redirect()->route('login');
        }
        return view('supervisor');
    }

    public function restriccionVendedor(){
        if (Auth::user()->role !== 'vendedor') {
            return redirect()->route('login');
        }
        return view('vendedor');
    }

    
}
