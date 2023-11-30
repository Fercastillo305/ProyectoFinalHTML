<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class addProducto extends Controller
{
    public function index()
    {
        return view('formularioProducto');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion_corta' => 'required|string|max:70',
            'descripcion' => 'required|string|max:500',
            'foto1' => 'required|string|max:255',
            'foto2' => 'required|string|max:255',
            'precio' => 'required|numeric|max:999999.99',
            'almacen' => 'required|numeric|max:999999.99',
            'fabricante' => 'required|string|max:255',
            'origen' => 'required|string|max:255',
        ]);
        
       // Insertar datos en la tabla 'productos'
       $id_producto = DB::table('productos')->insertGetId([
        'nombre' => $request->input('nombre'),
        'descripcion_corta' => $request->input('descripcion_corta'),
        'descripcion' => $request->input('descripcion'),
        'foto1' => $request->input('foto1'),
        'foto2' => $request->input('foto2'),
        'precio' => $request->input('precio'),
        'almacen' => $request->input('almacen'),
        'fabricante' => $request->input('fabricante'),
        'origen' => $request->input('origen'),
        // Agrega más campos según sea necesario
    ]);
        

        // Puedes redirigir a otra página o mostrar un mensaje de éxito aquí
        return redirect('/addProducto')->with('success', 'Datos guardados exitosamente.');
    }
    
}
