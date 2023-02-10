<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDetalleFactura extends Model
{
    use HasFactory;

    protected $table = 'detalles_facturas';
    protected $guarded = [];
    public $timestamps = false;

    public function factura()
    {
        return $this->belongsTo(MFactura::class, 'factura_id');
    }

    public function producto()
    {
        return $this->belongsTo(MProducto::class, 'producto_id');
    }

    public function guardar($factura_id, $producto_id, $cantidad, $precio)
    {
        $this->factura_id = $factura_id;
        $this->producto_id = $producto_id;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        return $this->save();
    }
}
