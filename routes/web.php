<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ComentarioController;


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

Route::get('/Registro', function () {
    return view('Registro');
});

Route::get('/producto', function () {
    return view('producto.index');
});

Route::get('/supervisor', function () {
    return view('Supervisor');
});

Route::get('/categorias/agregarCategoria', function () {
    return view('categorias.agregarCategoria');
});

Route::get('/categorias/editarCategoria', function () {
    return view('categorias.editarCategoria');
});

Route::get('/usuarios/agregarUsuario', function () {
    return view('usuarios.agregarUsuario');
});

Route::get('/usuarios/editarUsuario', function () {
    return view('usuarios.editarUsuario');
});



Route::post('/login', [LoginController::class, 'valida'])->name('login'); 
// Cambio en la ruta de login


// Rutas para las vistas de los distintos roles
Route::view('/cliente', 'cliente')->name('cliente');
Route::view('/Contador', 'contador')->name('contador');
Route::view('/encargado', 'encargado')->name('encargado');
Route::view('/supervisor', 'supervisor')->name('supervisor');
Route::view('/vendedor', 'vendedor')->name('vendedor');


// Ruta por defecto en caso de que no se encuentre un rol específico para el usuario
Route::view('/default', 'default')->name('default');

Route::get('/', [CategoriaController::class, 'index']);
Route::get('/cliente', [CategoriaController::class, 'indexCliente']);

//Ruta para el proceso de mostrar las categorias
Route::get('/supervisor', [CategoriaController::class, 'indexSupervisor'])->name('supervisor');


//Rutas para el proceso de agregar Categorias
Route::get('/categorias/agregarCategoria', [CategoriaController::class, 'crearCategoria'])->name('categorias.agregarCategoria');
Route::post('supervisor', [CategoriaController::class, 'guardarCategoria'])->name('supervisor');


//Rutas para el proceso de actualizar Categorias
Route::get('/categorias/editarCategoria/{id}', [CategoriaController::class, 'editCategoria'])->name('editarCategoria.actualizarCategoria');
Route::put('supervisor', [CategoriaController::class, 'actualizarCategoria'])->name('supervisor');


//Ruta para el proceso de eliminar Categorias
Route::delete('/elimicarCategoria/{id}', [CategoriaController::class, 'elimicarCategoria'])->name('categorias.elimicarCategoria');


//Ruta para el proceso de registro de usuarios desde la vista welcome
Route::get('/Registro', [RegistroController::class, 'ir'])->name('Registro');
Route::post('/Registro', [RegistroController::class, 'registrarUsuario'])->name('/Registro');


//Ruta para el proceso de mostrar las usuarios
Route::get('/supervisor/usuarios', [RegistroController::class, 'verUsuarios'])->name('supervisor.usuarios');

//Ruta para el proceso de registro de usuarios desde la vista supervisor
Route::get('/usuarios/agregarUsuario', [RegistroController::class, 'IrRegistro'])->name('usuarios.agregarUsuario');
Route::post('/supervisor', [RegistroController::class, 'registerUsuario'])->name('/supervisor');

//Rutas para mostrar los productos consignados y no consignados, tambien muestra las categorias
Route::get('/producto', [ProductoController::class, 'index'])->name('index');
Route::get('/productos/{categoriaId}', [ProductoController::class, 'productCate'])->name('productos.productCate');
Route::get('/noconsignados', [ProductoController::class, 'noConsignados'])->name('noConsignados');
Route::get('/cliente', [ProductoController::class, 'indexCliente'])->name('cliente');



//Ruta para el proceso de mostrar las categorias en la vista Encargado
Route::get('/encargado', [CategoriaController::class, 'indexEncargado'])->name('encargado');

//Rutas para el proceso de actualizar contraseña(encargado,cleinte,contador) de la vista Encargado
Route::get('/usuarios/editarUsuario/{id}', [RegistroController::class, 'editarContra'])->name('usuarios.editarUsuario');
Route::put('/encargado', [RegistroController::class, 'actualizarContra'])->name('encargado');



//Rutas para los comentarios
Route::post('/comentario', [ComentarioController::class, 'guardar'])->name('comentario');
//Route::post('/comentario', [ComentarioController::class, 'guardarComentario'])->name('comentario');
Route::get('/comentario/{id_producto}', [ComentarioController::class, 'mostrar'])->name('comentarios.show');




