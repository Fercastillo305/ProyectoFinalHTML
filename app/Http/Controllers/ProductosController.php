<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function mostrar()
    {
        $productos = Producto::all();

        return view('productos', compact('productos'));
    }
    public function ventas()
    {
        $ventas = DB::table('productos as p')
        ->join('compras as c', 'p.id_producto', '=', 'c.id_producto')
        ->select('c.id_compra', 'c.id_usuario', 'p.nombre', 'p.id_producto', 'c.id_producto','c.fecha')
        ->get();
    

        return view('ventas', compact('ventas'));
    }

    public function editProducto(Request $request)
{
    // Validar los datos del formulario
    $this->validate($request, [
        'nombre' => 'required',
        'descripcion_corta' => 'required',
        'precio' => 'required|numeric',
        'almacen' => 'required|numeric',
        'fabricante' => 'required',
        'origen' => 'required',
    ]);

    DB::table('productos')
    ->where('id_producto', $request->input('id_producto'))
    ->update([
        'nombre' => $request->input('nombre'),
        'descripcion_corta' => $request->input('descripcion_corta'),
        'precio' => $request->input('precio'),
        'almacen' => $request->input('almacen'),
        'fabricante' => $request->input('fabricante'),
        'origen' => $request->input('origen'),
    ]);
    // Redirigir al usuario a la página de productos
    return redirect('/productos');
}
}
