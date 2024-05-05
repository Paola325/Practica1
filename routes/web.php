<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/producto', function () {
    return view('producto.index');
});

Route::post('/login', [LoginController::class, 'valida'])->name('login'); // Cambio en la ruta de login

// Rutas para las vistas de los distintos roles
Route::view('/cliente', 'cliente')->name('cliente');
Route::view('/Contador', 'contador')->name('contador');
Route::view('/encargado', 'encargado')->name('encargado');
Route::view('/supervisor', 'supervisor')->name('supervisor');
Route::view('/vendedor', 'vendedor')->name('vendedor');

// Ruta por defecto en caso de que no se encuentre un rol específico para el usuario
Route::view('/default', 'default')->name('default');


Route::get('/', [CategoriaController::class, 'index']);
Route::get('/producto', [ProductoController::class, 'index'])->name('productos.index');