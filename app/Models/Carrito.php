<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Agrega user_id al array $fillable
        'id_producto', // Este es el nombre que estás usando en tu migración, asegúrate de que sea correcto
        'cantidad',
        // ... otros campos permitidos
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }
}
