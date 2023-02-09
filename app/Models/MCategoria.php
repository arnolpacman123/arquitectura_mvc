<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MCategoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $guarded = [];
    public $timestamps = false;

    public function listar()
    {
        return $this->all()->sortByDesc('id');
    }

    public function guardar(Request $request)
    {
        if ($request->nombre === null  || $request->descripcion === null) {
            return false;
        }
        $this->nombre = $request->nombre;
        $this->descripcion = $request->descripcion;
        return $this->save();
    }

    public function obtener(int $id): MCategoria
    {
        return $this->findOrFail($id);
    }

    public function actualizar(Request $request)
    {
        if ($request->nombre === null  && !$request->descripcion === null) {
            return false;
        }
        $this->nombre = $request->nombre;
        $this->descripcion = $request->descripcion;
        return $this->save();
    }

    public function eliminar(int $id)
    {
        return $this->destroy($id);
    }
}
