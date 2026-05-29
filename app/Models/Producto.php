<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'categoria_id',
        'nombre',
        'sku',
        'precio',
        'stock',
        'disponible',
    ];

    protected $casts = [
        'precio'        => 'decimal:2',
        'disponible'    => 'boolean',
        'stock'         => 'integer',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
