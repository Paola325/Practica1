<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario; // Agregado el modelo Usuario

class LoginController extends Controller
{
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
}
