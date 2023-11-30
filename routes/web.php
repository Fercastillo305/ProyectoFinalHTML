<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\SingleController;

//Route::get('/suplementos', [SingleController::class, 'todos'])->name('suplementos.todos');


Auth::routes();

Route::get('/', function () {
    return view('index'); 
})->name('inicio');


Route::get('/suplementos', [App\Http\Controllers\SingleController::class, 'todos']);
Route::get('/accesorios', [App\Http\Controllers\SingleController::class, 'accesorios']);
Route::get('/snacks', [App\Http\Controllers\SingleController::class, 'stacks']);
Route::get('/contacto', function () { return view('contacto'); })->name('inicio');
//Route::get('/carrito', [App\Http\Controllers\SingleController::class, 'todos']);

Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'verCarrito'])->name('carrito.ver');
    Route::get('/addcarrito/{id}', [App\Http\Controllers\CarritoController::class, 'agregarProducto'])->name('agregarAlCarrito');
    Route::get('/eliminar/{id}', [App\Http\Controllers\CarritoController::class, 'eliminar'])->name('eliminar');

    Route::get('/comprar', [App\Http\Controllers\CarritoController::class, 'index'])->name('comprar');
Route::post('/comprar', [App\Http\Controllers\CarritoController::class, 'store'])->name('comprardos');
Route::get('/historial', [App\Http\Controllers\CarritoController::class, 'historial'])->name('historial');

Route::get('/usuario', [App\Http\Controllers\CarritoController::class, 'usuario'])->name('usuario');

Route::get('/addProducto', [App\Http\Controllers\addProducto::class, 'index']);
Route::post('/addProducto', [App\Http\Controllers\addProducto::class, 'store'])->name('addProducto');
Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'mostrar']);
Route::get('/ventas', [App\Http\Controllers\ProductosController::class, 'ventas']);
Route::get('/productos/{id}', [App\Http\Controllers\ProductosController::class, 'editProducto'])->name('editProducto');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/single/{id}', [App\Http\Controllers\SingleController::class, 'mostrar']);


Route::get('/addProducto', [App\Http\Controllers\addProducto::class, 'index']);
Route::post('/addProducto', [App\Http\Controllers\addProducto::class, 'store'])->name('addProducto');
Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'mostrar']);
Route::get('/productos/{id}', [App\Http\Controllers\ProductosController::class, 'editProducto'])->name('editProducto');


