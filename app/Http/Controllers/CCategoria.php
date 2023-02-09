<?php

namespace App\Http\Controllers;

use App\Models\MCategoria;
use Illuminate\Http\Request;

class CCategoria extends Controller
{
    public MCategoria $mCategoria;

    public function __construct()
    {
        $this->mCategoria = new MCategoria();
    }

    public function listar()
    {
        $categorias = $this->mCategoria->listar();
        return view('categorias.listar', [
            'categorias' => $categorias
        ]);
    }


    public function guardar(Request $request)
    {
        $this->mCategoria->guardar($request);
        return redirect()->route('categorias.listar');
    }

    public function obtener(int $id)
    {
        $mCategoria = $this->mCategoria->obtener($id);
        return view('categorias.editar', [
            'categoria' => $mCategoria
        ]);
    }

    public function actualizar(Request $request, int $id)
    {
        $categoria = $this->mCategoria->obtener($id);
        $categoria->actualizar($request);
        return redirect()->route('categorias.listar');
    }


    public function eliminar(int $id)
    {
        $this->mCategoria->eliminar($id);
        return redirect()->route('categorias.listar');
    }
}
