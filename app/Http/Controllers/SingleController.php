<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class SingleController extends Controller
{
  public function todos()
    {
        $productos = DB::table('productos')->get();

        return view('suplementos', ['productos' => $productos]);
    }

    public function accesorios()
    {
        $productos = DB::table('productos')->get();

        return view('accesorios', ['productos' => $productos]);
    }

    public function stacks()
    {
        $productos = DB::table('productos')->get();

        return view('stacks', ['productos' => $productos]);
    }


    public function mostrar($id)
    {
        $fabricante="";

        // Obtener el nombre
        $nombre = DB::table('productos')->where('id_producto', $id)->value('nombre');
        $precio = DB::table('productos')->where('id_producto', $id)->value('precio');
        $descripcion = DB::table('productos')->where('id_producto', $id)->value('descripcion');
        $foto1 = DB::table('productos')->where('id_producto', $id)->value('foto1');
        $foto2 = DB::table('productos')->where('id_producto', $id)->value('foto2');
        $fabricante = DB::table('productos')->where('id_producto', $id)->value('fabricante');
        $almacen = DB::table('productos')->where('id_producto', $id)->value('almacen');
       

        $foto1 = "<img class='card-img img-fluid' id='product-detail' src='/resources/img/" . $foto1 . "'>";
        $foto2 = "<img class='card-img img-fluid' id='product-detail' src='/resources/img/" . $foto2 . "'>";
        // Mostrar el número
        // Mostrar el número
        return view('single', [
            'nombre' => $nombre,
            'precio' => $precio,
            'foto1'=>$foto1,
            'foto2'=>$foto2,
            'descripcion' => $descripcion,
            'fabricante' => $fabricante,
            'almacen' => $almacen,
          'id'=>$id,
        ]);
    }


    public function addtocard($id)
{
    // Validar el ID del producto
    if (!is_numeric($id)) {
        return redirect()->back()->with('error', 'Invalid product ID');
    }

    // Obtener el producto
    $product = Product::findOrFail($id);

    // Agregar el producto al carrito
    $this->cart->add($product);

    // Redirigir al usuario a la página del carrito
    return redirect()->route('cart');
}



    

}
