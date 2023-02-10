<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MProducto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $guarded = [];
    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(MCategoria::class, 'categoria_id');
    }

    public function detallesFacturas()
    {
        return $this->hasMany(MDetalleFactura::class, 'producto_id');
    }

    public function listar()
    {
        return $this->all()->sortByDesc('id');
    }

    public function guardar(Request $request)
    {
        if ($request->nombre === null || $request->descripcion === null || $request->precio === null || $request->categoria_id === null) {
            return false;
        }
        $this->nombre = $request->nombre;
        $this->descripcion = $request->descripcion;
        $this->precio = $request->precio;
        $this->categoria_id = $request->categoria_id;
        return $this->save();
    }

    public function obtener(int $id): MProducto
    {
        return $this->findOrFail($id);
    }

    public function actualizar(Request $request)
    {
        if ($request->nombre === null && !$request->descripcion === null && !$request->precio === null && !$request->categoria_id === null) {
            return false;
        }

        $this->nombre = $request->nombre;
        $this->descripcion = $request->descripcion;
        $this->precio = $request->precio;
        $this->categoria_id = $request->categoria_id;
        return $this->save();
    }

    public function eliminar(int $id)
    {
        return $this->destroy($id);
    }
}
