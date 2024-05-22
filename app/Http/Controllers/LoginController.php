<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cookie;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function valida(Request $request){
        // Obtiene las credenciales del formulario de inicio de sesión
        $credentials = $request->only('email', 'password');
        
        // Busca el usuario en la base de datos por su correo electrónico
        $user = Usuario::where('email', $credentials['email'])->first();
    
        // Comprueba si se encontró un usuario y si la contraseña proporcionada coincide con el hash almacenado
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Si las credenciales son válidas, inicia sesión con el usuario y redirige según su rol
            Auth::login($user);
            return redirect()->route($user->role); // Redirige según el rol del usuario
        } else {
            // Si las credenciales no son válidas, redirige de nuevo a la página de inicio de sesión con un mensaje de error
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
            Cookie::forget('laravel_session');
        }
        return view('cliente');
    }
    
    public function restriccionContador(){
        if (Auth::user()->role !== 'contador') {
            return redirect()->route('login');
            Cookie::forget('laravel_session');
        }
        return view('contador');
    }
    
    public function restriccionEncargado(){
        if (Auth::user()->role !== 'encargado') {
            return redirect()->route('login');
            Cookie::forget('laravel_session');
        } 
        return view('encargado');
    }

    public function restriccionSupervisor()
    {
        if (Auth::user()->role !== 'supervisor') {
            return redirect()->route('login');
            Cookie::forget('laravel_session');
        }
        return view('supervisor');
    }

    public function restriccionVendedor(){
        if (Auth::user()->role !== 'vendedor') {
            return redirect()->route('login');
            Cookie::forget('laravel_session');
        }
        return view('vendedor');
    }

    
}
