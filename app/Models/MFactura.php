<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MFactura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $guarded = [];
    public $timestamps = false;
    public array $detallesFacturas;

    public function __construct()
    {
        parent::__construct();
        $this->detallesFacturas = [];
    }

    public function detalles_facturas()
    {
        return $this->hasMany(MDetalleFactura::class, 'factura_id', 'id');
    }

    public function listar()
    {
        return $this->all();
    }

    public function obtener(int $id): MFactura
    {
        return $this->findOrFail($id);
    }

    public function guardar(Request $request)
    {
        if ($request->fecha === null || $request->monto === null || $request->nombre_cliente === null || $request->nit === null || $request->productos_ids === null || $request->cantidades === null || $request->precios === null) {
            return false;
        }
        $monto = 0;
        for ($i = 0; $i < count($request->productos_ids); $i++) {
            $cantidad = $request->cantidades[$i];
            $precio = $request->precios[$i];
            $monto += $cantidad * $precio;
        }
        $this->fecha = $request->fecha;
        $this->monto = $monto;
        $this->nombre_cliente = $request->nombre_cliente;
        $this->nit = $request->nit;
        $result = $this->save();
        if (!$result) {
            return false;
        }
        $productos_ids = $request->productos_ids;
        for ($i = 0; $i < count($productos_ids); $i++) {
            $producto = MProducto::findOrFail($productos_ids[$i]);
            $cantidad = $request->cantidades[$i];
            $precio = $request->precios[$i];
            $detalle_factura = new MDetalleFactura();
            $detalle_factura->guardar($this->id, $producto->id, $cantidad, $precio);
            $this->detallesFacturas[] = $detalle_factura;
        }
        return true;
    }

    public function actualizar(Request $request)
    {
        if ($request->fecha === null && !$request->monto === null && !$request->nombre_cliente === null && !$request->nit === null && !$request->detalles === null) {
            return false;
        }

        $this->fecha = $request->fecha;
        $this->monto = $request->monto;
        $this->nombre_cliente = $request->nombre_cliente;
        $this->nit = $request->nit;
        $result = $this->save();
        if (!$result) {
            return false;
        }
        $detalles = $request->detalles;
        foreach ($detalles as $detalle) {
            $detalle_factura = new MDetalleFactura();
            $detalle_factura->factura_id = $this->id;
            $detalle_factura->producto_id = $detalle['producto_id'];
            $detalle_factura->cantidad = $detalle['cantidad'];
            $detalle_factura->precio = $detalle['precio'];
            $detalle_factura->save();
            $this->detallesFacturas[] = $detalle_factura;
        }
        return true;
    }

    public function eliminar(int $id)
    {
        return $this->destroy($id);
    }
}
