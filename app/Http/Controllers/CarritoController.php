<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CarritoController extends Controller
{
    public function agregarProducto($id)
    {
        
        $user = auth()->user();
        $userId = $user->id;

        DB::table('carritos')->insert([
            'user_id' => $userId,
            'producto_id' => $id, // Ajusta esto según tu lógica de aplicación
            'cantidad' => 1, // Puedes cambiar esto según tus necesidades
            'created_at' => now(), // Puedes ajustar esto según tus necesidades
            'updated_at' => now(), // Puedes ajustar esto según tus necesidades
        ]);

        return redirect()->route('carrito.ver');
    }

    public function eliminar($id)
    {
        
        $user = auth()->user();
        $userId = $user->id;

        DB::table('carritos')
    ->where('user_id', $userId)
    ->where('producto_id', $id) 
    ->delete();

        return redirect()->route('carrito.ver');
    }

    public function verCarrito()
    {
        $user = auth()->user();
        if ($user) {
            $userId = $user->id;
            //echo $userId;
        } else {
            echo "Usuario no autenticado";
        }
        $resultados = Carrito::select('productos.nombre', 'productos.precio', 'productos.id_producto', 'carritos.user_id', 'carritos.producto_id', 'carritos.cantidad')
            ->join('productos', 'productos.id_producto', '=', 'carritos.producto_id')
            ->where('carritos.user_id', $userId)
            ->get();
       
        return view('carrito', compact('resultados'));
    }

    public function historial()
    {
        $user = auth()->user();
        if ($user) {
            $userId = $user->id;
            //echo $userId;
        } else {
            echo "Usuario no autenticado";
        }
        $resultados = DB::table('compras as c')
    ->join('productos as p', 'c.id_producto', '=', 'p.id_producto')
    ->select('c.id_usuario', 'c.id_producto', 'p.nombre', 'p.id_producto','c.fecha')
    ->where('c.id_usuario', $userId)
    ->get();

       
        return view('historial', compact('resultados'));
    }


    public function usuario()
    {
        $user = auth()->user();
        if ($user) {
            $userId = $user->id;
            //echo $userId;
        } else {
            echo "Usuario no autenticado";
        }
        $resultados = User::select('name', 'email', 'created_at', 'fecha_nac', 'tarjeta', 'direccion')
                  ->where('id', $userId)
                  ->get();


       
        return view('usuario', compact('resultados'));
    }


    public function index()
{
    $user = auth()->user();
    $userId = $user->id;

    // Obtener información del usuario desde la base de datos
    $userInfo = DB::table('users')
        ->where('id', $userId)
        ->select('tarjeta', 'direccion', 'fecha_nac')
        ->first();

    // Verificar si los campos no están vacíos
    if ($userInfo->tarjeta !== null && $userInfo->direccion !== null && $userInfo->fecha_nac !== null) {
       // Obtener todos los elementos del carrito para el usuario actual
       $elementosCarrito = DB::table('carritos')
       ->where('user_id', $userId)
       ->get();

   // Insertar cada elemento del carrito en la tabla de compras
   foreach ($elementosCarrito as $elemento) {
      

       DB::table('compras')->insert([
        'id_usuario' => $userId,
        'id_producto' => $elemento->producto_id,
        'fecha' => now(),
      ]);
   }
   DB::table('carritos')->where('user_id', $userId)->delete();
   DB::table('productos')
    ->where('id_producto', $elemento->producto_id)
    ->update(['almacen' => DB::raw('almacen - 1')]);

   return redirect('/historial')->with('success', 'Datos guardados exitosamente.');
    }
    
    else{
    return view('formularioCompra');}
}

    public function store(Request $request)
    {
        $user = auth()->user();
        $userId = $user->id;
        //echo ($userId);
       // Insertar datos en la tabla 'productos'
       DB::table('users')
       ->where('id', $userId)
       ->update([
           'tarjeta' => $request->input('tarjeta'),
           'direccion' => $request->input('direccion'),
           'fecha_nac' => $request->input('fecha_nac'),
       ]);
        
       $elementosCarrito = DB::table('carritos')
       ->where('user_id', $userId)
       ->get();

   // Insertar cada elemento del carrito en la tabla de compras
   foreach ($elementosCarrito as $elemento) {
    DB::table('compras')->insert([
      'id_usuario' => $userId,
      'id_producto' => $elemento->producto_id,
      'fecha' => now(),
    ]);
  }
   

   foreach ($elementosCarrito as $elemento) {
    DB::table('productos')->update([
        'id_usuario' => 6,
        'id_producto' => 1,
        'fecha' => now()->toDateTimeString(),
      ]);
   }
   DB::table('carritos')->where('user_id', $userId)->delete();

   DB::table('productos')
    ->where('id_producto', $elemento->producto_id)
    ->update(['almacen' => DB::raw('almacen - 1')]);


        // Puedes redirigir a otra página o mostrar un mensaje de éxito aquí
        return redirect('/historial')->with('success', 'Datos guardados exitosamente.');
    }
}
