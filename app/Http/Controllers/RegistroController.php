<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categorias;
use App\Http\Requests\StoreRegistroRequest;

class RegistroController extends Controller
{
    public function ir()
    {
        return view('Registro');
    }

    public function registrarUsuario(StoreRegistroRequest $request)
    {
        $nombre = $request -> nombre;
        $email = $request -> email;
        $apellido_paterno = $request -> apellido_paterno;
        $apellido_materno = $request -> apellido_materno;
        $password = $request -> password;

        $passwordC = bcrypt ($password);

        $usuario = new Usuario();
        $usuario->nombre = $nombre;
        $usuario->email = $email;
        $usuario->apellido_paterno = $apellido_paterno;
        $usuario->apellido_materno = $apellido_materno;
        $usuario->password = $passwordC;
        $usuario->role =  'cliente';
        $usuario->save();

        return redirect(route('Registro'));
    }

    //Usuarios desde el role Supervisor
    public function verUsuarios(Request $request) //Ver las categorias
    {
        $usuario = Usuario::all();
        $categorias = Categorias::all();

        if ($request->expectsJson()) {
            return response()->json($usuario);
        } else {
            return view('supervisor', compact('usuario', 'categorias'));
        }
    }

    public function IrRegistro()
    {
        return view('usuarios.agregarUsuario');
    }

    public function registerUsuario(StoreRegistroRequest $request)
    {
        $role = $request -> role;
        $nombre = $request -> nombre;
        $email = $request -> email;
        $apellido_paterno = $request -> apellido_paterno;
        $apellido_materno = $request -> apellido_materno;
        $password = $request -> password;

        $passwordC = bcrypt ($password);

        $usuario = new Usuario();
        $usuario->role = $role;
        $usuario->nombre = $nombre;
        $usuario->email = $email;
        $usuario->apellido_paterno = $apellido_paterno;
        $usuario->apellido_materno = $apellido_materno;
        $usuario->password = $passwordC;
        $usuario->save();

        return redirect(route('supervisor'));
    }
    
}
