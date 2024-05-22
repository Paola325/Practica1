<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\CompraController;
use App\Models\Transaccion;

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

// Rutas para las vistas de los distintos roles
Route::get('/supervisor', [LoginController::class, 'restriccionSupervisor'])->middleware('auth')->name('supervisor');
Route::get('/cliente', [LoginController::class, 'restriccionCliente'])->middleware('auth')->name('cliente');
Route::get('/contador', [LoginController::class, 'restriccionContador'])->middleware('auth')->name('contador');
Route::get('/encargado', [LoginController::class, 'restriccionEncargado'])->middleware('auth')->name('encargado');
Route::get('/vendedor', [LoginController::class, 'restriccionVendedor'])->middleware('auth')->name('vendedor');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/Registro', function () {
    return view('Registro');
});

Route::get('/producto/index', function () {
    return view('producto.index');
});

Route::get('/producto/index', function () {
    return view('producto.index');
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

Route::get('/usuarios/actualizarUsuario', function () {
    return view('usuarios.actualizarUsuario');
});

Route::get('/producto/productoVendedor', function () {
    return view('producto.productoVendedor');
});

Route::get('/producto/consignados', function () {
    return view('producto.consignados');
});

Route::get('/vistasSupervisor/tablaCategorias', function () {
    return view('vistasSupervisor.tablaCategorias');
});

Route::get('/vistasSupervisor/tablaClientes', function () {
    return view('vistasSupervisor.tablaClientes');
});

Route::get('/vistasSupervisor/tablaInfoCliente', function () {
    return view('vistasSupervisor.tablaInfoCliente');
});


Route::get('/vistasSupervisor/tablero', function () {
    return view('vistasSupervisor.tablero');
});


Route::get('/vistasEncargado/tablaCategorias', function () {
    return view('vistasEncargado.tablaCategorias');
});

Route::get('/vistasEncargado/tablaClientes', function () {
    return view('vistasEncargado.tablaClientes');
});

Route::get('/vistasEncargado/tablero', function () {
    return view('vistasEncargado.tablero');
});


Route::get('/vistasSupervisor/tablaProductos', function () {
    return view('vistasSupervisor.tablaProductos');
});

Route::get('/producto/rechazado', function () {
    return view('producto.rechazado');
});

Route::get('/vistasSupervisor/kardexProducto', function () {
    return view('vistasSupervisor.kardexProducto');
});


Route::get('/vistasVendedor/verProducto', function () {
    return view('vistasVendedor.verProducto');
});

Route::get('/vistasVendedor/comprarProducto', function () {
    return view('vistasVendedor.comprarProducto');
});

Route::get('/vistasVendedor/registroProducto', function () {
    return view('vistasVendedor.registroProducto');
});

Route::get('/vistasCliente/mostrarProducto', function () {
    return view('vistasCliente.mostrarProductos');
});


Route::get('/vistasVendedor/mostrarFotos', function () {
    return view('vistasVendedor.mostrarFotos');
});

// Cambio en la ruta de login
Route::post('/login', [LoginController::class, 'valida'])->name('login'); 


// Ruta por defecto en caso de que no se encuentre un rol específico para el usuario
Route::view('/default', 'default')->name('default');

Route::get('/', [CategoriaController::class, 'index']);
Route::get('/producto/index', [ProductoController::class, 'index'])->name('producto.index');

//Route::get('/cliente', [CategoriaController::class, 'indexCliente']);

//Ruta para el proceso de mostrar las categorias
Route::get('/vistasSupervisor/tablaCategorias', [CategoriaController::class, 'indexSupervisor'])->name('vistasSupervisor.tablaCategorias');


//Ruta para el proceso de mostrar los productos por categoria en la vista de Supervisor
//Route::get('/vistasSupervisor/tablaProductos/{categoriaId}', [ProductoController::class, 'porValidar'])->name('porConsignar');

Route::get('/vistasSupervisor/tablaProductos/{categoriaId}', [ProductoController::class, 'verProductosCategoria'])->name('vistasSupervisor.tablaProductos');

Route::get('/vistasSupervisor/kardexProducto/{id}', [ProductoController::class, 'kardex'])->name('vistasSupervisor.kardexProducto');

//Ruta para mostrar el tablero en supervisor
Route::get('/vistasSupervisor/tablero', [TransaccionController::class, 'tablero'])->name('vistasSupervisor.tablero');


//Rutas para el proceso de agregar Categorias
Route::get('/categorias/agregarCategoria', [CategoriaController::class, 'crearCategoria'])->name('categorias.agregarCategoria');
Route::post('/categorias/agregarCategoria', [CategoriaController::class, 'guardarCategoria'])->name('categoria');


//Rutas para el proceso de actualizar Categorias
Route::get('/categorias/editarCategoria/{id}', [CategoriaController::class, 'editCategoria'])->name('editarCategoria.actualizarCategoria');
Route::put('/categorias', [CategoriaController::class, 'actualizarCategoria'])->name('categoria.actualizarCategoria');


//Ruta para el proceso de eliminar Categorias
Route::delete('/elimicarCategoria/{id}', [CategoriaController::class, 'elimicarCategoria'])->name('categorias.elimicarCategoria');


//Ruta para el proceso de registro de usuarios desde la vista welcome
Route::get('/Registro', [RegistroController::class, 'ir'])->name('Registro'); 
Route::post('/Registro', [RegistroController::class, 'registrarUsuario'])->name('Registro');


//Ruta para el proceso de mostrar las usuarios
Route::get('/vistasSupervisor/tablaClientes', [RegistroController::class, 'verUsuarios'])->name('vistasSupervisor.tablaClientes');

//Ruta para el proceso de mostrar los vendedores desde la vista Supervisor
Route::get('/vistasSupervisor/tablaInfoCliente', [RegistroController::class, 'verInfoVendedores'])->name('vistasSupervisor.tablaInfoCliente');

//Ruta para el proceso de registro de usuarios desde la vista supervisor
Route::get('/usuarios/agregarUsuario', [RegistroController::class, 'IrRegistro'])->name('usuarios.agregarUsuario');
Route::post('/vistasSupervisor/tablaClientes', [RegistroController::class, 'registerUsuario'])->name('vistasSupervisor.tablaClientes');

//Ruta para el proceso de actuliazar los datos de los usuarios desde la view supervisor
Route::get('/usuarios/actualizarUsuario/{id}', [RegistroController::class, 'editarUser'])->name('usuarios.actualizarUsuario');
Route::put('/vistasSupervisor/tablaClientes', [RegistroController::class, 'actualizarUser'])->name('vistasSupervisor.tablaClientes');

//Rutas para mostrar los productos consignados, por consignar y no consignados, tambien muestra las categorias
//Route::get('/producto', [ProductoController::class, 'index'])->name('index');



//Ruta para el proceso de mostrar los productos por consignar
Route::get('/porConsignar/{categoriaId}', [ProductoController::class, 'porValidar'])->name('porConsignar');
// Ruta para consignar un producto
Route::put('/porConsignar/{categoriaId}/aceptar', [ProductoController::class, 'aceptar'])->name('aceptar.producto');

// Ruta para rechazar un producto
Route::put('/porConsignar/{categoriaId}/rechazar', [ProductoController::class, 'rechazar'])->name('rechazar.producto');

//Ruta para el proceso de mostrar los productos consignados
Route::get('/consignados/{categoriaId}', [ProductoController::class, 'productCate'])->name('consignados.productCate');
// Ruta para desConsignar un producto
Route::put('/consignados/{categoriaId}', [ProductoController::class, 'desConsignar'])->name('producto.consignados');


//Ruat para el proceso de mostrar los productos por categoria en la vista de Cliente
//Route::get('/prod/{categoriaId}', [ProductoController::class, 'viewProducto'])->name('productos.vistaProducto');
Route::get('/producto/index/{categoriaId}', [ProductoController::class, 'anonimoProducto'])->name('producto.index');
Route::get('/vistasCliente/mostrarProductos/{categoriaId}', [ProductoController::class, 'clienteProducto'])->name('vistasCliente.mostrarProductos');


//Ruta para el proceso de no consignar producto
//Route::put('/supervisor', [RegistroController::class, 'rechazar'])->name('supervisor');

//Ruta para el proceso de ver los productos no consignados
Route::get('/noconsignados/{categoriaId}', [ProductoController::class, 'noConsignados'])->name('noConsignados');

//Checar esto mañana o despues de la pelicula!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
Route::get('/cliente', [ProductoController::class, 'indexCliente'])->middleware('auth')->name('cliente');



//Ruta para el proceso de mostrar las categorias en la vista Encargado
Route::get('/vistasEncargado/tablaCategorias', [CategoriaController::class, 'indexEncargado'])->name('vistasEncargado.tablaCategorias');

//Ruta para el proceso de mostrar los productos en la vista Encargado
Route::get('/vistasEncargado/tablaClientes', [RegistroController::class, 'mostrarProductos'])->name('vistasEncargado.tablaClientes');

//Rutas para el proceso de actualizar contraseña(encargado,cleinte,contador) de la vista Encargado
Route::get('/usuarios/editarUsuario/{id}', [RegistroController::class, 'editarContra'])->name('usuarios.editarUsuario');
Route::put('/vistasEncargado/tablaClientes', [RegistroController::class, 'actualizarContra'])->name('vistasEncargado.tablaClientes');




//Rutas para los comentarios
Route::post('/comentario', [ComentarioController::class, 'guardar'])->name('comentario');
Route::get('/comentario/{id_producto}', [ComentarioController::class, 'mostrar'])->name('comentarios.show');


//Ruta paran el proceso de mostrar los productos perteneciente a su respectivo vendedor
Route::get('/vistasVendedor/verProducto', [ProductoController::class, 'verProductosVendedor'])->name('vistasVendedor.verProducto');
Route::get('/producto/responderComentario/{id_producto}', [ComentarioController::class, 'verComentarios'])->name('responderComentario');

//Ruta paran el proceso de mostrar comprar como si fuera cliete
// Ruta para ver todos los productos
Route::get('/vistasVendedor/comprarProducto', [ProductoController::class, 'productoVer'])->name('vistasVendedor.comprarProducto');

// Ruta para ver productos filtrados por categoría
Route::get('/vistasVendedor/comprarProducto/{categoria}', [ProductoController::class, 'productoPorCategoria'])->name('vistasVendedor.comprarProducto.categoria');


//Route::get('/producto/vistaproducto', [ProductoController::class, 'productoComprar'])->name('producto.vistaproducto');


Route::post('/vistasVendedor/registroProducto', [ProductoController::class, 'crearProducto'])->name('vistasVendedor.registroProducto');

//Actualizar producto
Route::get('/vistasVendedor/{id_producto}', [ProductoController::class, 'formularioActualizarProducto'])->name('actualizarProducto');
Route::put('/vistasVendedor/actualizar', [ProductoController::class, 'actualizarProducto'])->name('actualizar.producto');

//Agregar fotos de los productos
Route::get('/vistasVendedor/agregarFotos/{id_producto}', [ProductoController::class, 'agregarFoto'])->name('producto.fotos');
Route::post('/vistasVendedor/agregarFotos', [ProductoController::class, 'agregarFotoProducto'])->name('agregar.fotos');

//Eliminar producto
Route::delete('/vistasVendedor/{id_producto}', [ProductoController::class, 'eliminarProducto'])->name('eliminar.producto');

//Mostrar las fotos de los productos
Route::get('/vistasVendedor/mostrarFotos', [ProductoController::class, 'mostrarFoto'])->name('mostrarFoto');

//Eliminar foto
Route::delete('/eliminar/foto/{id_foto}', [ProductoController::class, 'eliminarFoto'])->name('eliminar.foto');

//Mostrar que productos ha comprado el vendedor
Route::get('/verCompra', [ProductoController::class, 'comprasVendedor'])->name('verComprasVendedor');

//Mostrar los productos que ha vendido
Route::get('/verVentas', [ProductoController::class, 'ventasVendedor'])->name('verVentasVendedor');



//Compras 
Route::get('/compra/crear/{id_producto}/{id_usuario}', [CompraController::class, 'crearCompra'])->name('compra.crear');
Route::post('/compras', [CompraController::class, 'guardarCompra'])->name('compra.guardar');

//Transaccion de un producto
Route::get('/formulario/{idCompra}', [TransaccionController::class, 'crearFormulario'])->name('formulario.transaccion');
Route::post('/procesar-transaccion', [TransaccionController::class, 'procesarTransaccion'])->name('procesar.transaccion');

//Mostrar transaccion
Route::get('/transacciones', [TransaccionController::class, 'mostrarTransaccion'])->name('transacciones.mostrar');
Route::get('/transacciones/pago', [TransaccionController::class, 'mostrarTransaccionPago'])->name('transaccion.pago');

//Valida transaccion
Route::put('/transaccion/validar/{id}', [TransaccionController::class, 'validarTransaccion'])->name('transaccion.validar');

//Pagos
Route::post('/crear/pago', [TransaccionController::class, 'crearPago'])->name('crear_pago');

//Mostrar lista de los pagos
Route::get('/pago', [TransaccionController::class, 'ShowPagos'])->name('Show.pagos');
//cambiar la entrega de pagos
Route::get('/Entregado', [TransaccionController::class, 'Entregado'])->name('Entregado');


// Entregar transacciones
Route::put('/pago/entregar/{id}', [TransaccionController::class, 'EntregarPago'])->name('pago.entregar');


