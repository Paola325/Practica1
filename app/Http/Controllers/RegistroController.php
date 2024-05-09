<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class RegistroController extends Controller
{
    public function ir()
    {
        return view('Registro');
    }

    public function registrarUsuario(Request $request) //Registro desde la view Registro
    {

        $role = $request -> role;
        $nombre = $request -> nombre;
        $email = $request -> email;
        $apellido_paterno = $request -> apellido_paterno;
        $apellido_materno = $request -> apellido_materno;
        $password = $request -> password;

        $passwordC = bcrypt ($password);

        $usuario = new Usuario();
        $usuario->role =  'cliente';
        $usuario->nombre = $nombre;
        $usuario->email = $email;
        $usuario->apellido_paterno = $apellido_paterno;
        $usuario->apellido_materno = $apellido_materno;
        $usuario->password = $passwordC;
        $usuario->save();

        return redirect(route('Registro'));
    }

    //Usuarios desde el role Supervisor
    /*
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
    */

    public function IrRegistro()
    {
        return view('usuarios.agregarUsuario');
    }

    public function registerUsuario(StoreRegistroRequest $request) //Registro desde la view supervisor
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

    //Para ir al form de cambio de contraseña desde encargado
        public function editarContra(Request $request)
        {
            $id = $request->id;
            $usuario = Usuario::find($id);
            return view('usuarios.editarUsuario', compact('usuario'));      
        }

        //Cambio de la contraseña del Usarios desde la vista de Encargado
        public function actualizarContra(UpdateUsuarioRequest $request, Usuario $usuario)
        {
            $id = $request->id;
            $usuario = Usuario::find($id);
            $password = $request -> password;
            $passwordC = bcrypt ($password);
            $usuario->password = $passwordC;
            $usuario->save();
        
            if ($request->expectsJson()) {
                return response()->json($usuario->toArray(), 200, ["Cache-Control" => "no-cache"]);
            } else {
                return redirect(route('encargado'));
            }
        }

        //Te manda al form de cambio de contraseña desde la vista supervisor
        public function editarUser(Request $request)
        {
            $id = $request->id;
            $usuario = Usuario::find($id);
            return view('usuarios.actualizarUsuario', compact('usuario'));      
        }

        //Actualiza los datos de los usuarios desde la vista supervisor
        public function actualizarUser(UpdateUsuarioRequest $request, Usuario $usuario)
        {
            $id = $request->id;
            $usuario = Usuario::find($id);
            $role = $request -> role;
            $nombre = $request -> nombre;
            $email = $request -> email;
            $apellido_paterno = $request -> apellido_paterno;
            $apellido_materno = $request -> apellido_materno;
            $password = $request -> password;

            $passwordC = bcrypt ($password);


            $usuario->role = $role;
            $usuario->nombre = $nombre;
            $usuario->email = $email;
            $usuario->apellido_paterno = $apellido_paterno;
            $usuario->apellido_materno = $apellido_materno;
            $usuario->password = $passwordC;
            $usuario->save();
        
            if ($request->expectsJson()) {
                return response()->json($usuario->toArray(), 200, ["Cache-Control" => "no-cache"]);
            } else {
                return redirect(route('supervisor'));
            }
        }
    
}
