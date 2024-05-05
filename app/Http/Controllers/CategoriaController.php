<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categorias::all();

        if ($request->expectsJson()) {
            return response()->json($categorias);
        } else {
            return view('welcome', compact('categorias'));
        }
    }
}
