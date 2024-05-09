<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
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
}
