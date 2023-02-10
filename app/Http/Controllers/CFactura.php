<?php

namespace App\Http\Controllers;

use App\Models\MDetalleFactura;
use App\Models\MFactura;
use App\Models\MProducto;
use Illuminate\Http\Request;

class CFactura extends Controller
{
    public MFactura $factura;
    public MProducto $producto;

    public function __construct()
    {
        $this->factura = new MFactura();
        $this->producto = new MProducto();
    }

    public function listar()
    {
        $facturas = $this->factura->all();
        $productos = $this->producto->all();
        return view('facturas.listar', [
            'facturas' => $facturas,
            'productos' => $productos
        ]);
    }

    public function guardar(Request $request)
    {
        $this->factura->guardar($request);
        return redirect()->route('facturas.listar');
    }

    public function obtener($id)
    {
        $factura = $this->factura->obtener($id);
        $detalles_facturas = $factura->detalles_facturas;
        return view('facturas.editar', [
            'factura' => $factura,
            'detalles_facturas' => $detalles_facturas
        ]);
    }

    public function actualizar(Request $request, int $id)
    {
        $factura = $this->factura->obtener($id);
        $factura->actualizar($request);
        return redirect()->route('facturas.listar');
    }

    public function eliminar(int $id)
    {
        $this->factura->eliminar($id);
        return redirect()->route('facturas.listar');
    }
}
