<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\StoreRegistroRequest;

class RegistroController extends Controller
{
    public function ir()
    {
        return view('Registro');
    }

    public function registrarUsuario(StoreRegistroRequest $request)
    {
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->password = $request-> password;
        $usuario->role =  'cliente';
        $usuario->save();
        
        return redirect(route('welcome'));
    }
    
}
