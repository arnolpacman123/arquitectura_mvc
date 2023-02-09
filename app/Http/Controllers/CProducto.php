<?php

namespace App\Http\Controllers;

use App\Models\MCategoria;
use App\Models\MProducto;
use Illuminate\Http\Request;

class CProducto extends Controller
{
    public MProducto $mProducto;
    public MCategoria $mCategoria;

    public function __construct()
    {
        $this->mProducto = new MProducto();
        $this->mCategoria = new MCategoria();
    }

    public function listar()
    {
        $productos = $this->mProducto->listar();
        $categorias = $this->mCategoria->listar();
        return view('productos.listar', [
            'productos' => $productos,
            'categorias' => $categorias
        ]);
    }

    public function guardar(Request $request)
    {
        $this->mProducto->guardar($request);
        return redirect()->route('productos.listar');
    }

    public function obtener($id)
    {
        $producto = $this->mProducto->obtener($id);
        $categorias = $this->mCategoria->listar();
        return view('productos.editar', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $producto = $this->mProducto->obtener($id);
        $producto->actualizar($request);
        return redirect()->route('productos.listar');
    }

    public function eliminar($id)
    {
        $this->mProducto->eliminar($id);
        return redirect()->route('productos.listar');
    }
}
