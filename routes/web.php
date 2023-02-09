<?php

use App\Http\Controllers\CCategoria;
use App\Http\Controllers\CProducto;
use Illuminate\Support\Facades\Route;

Route::get('/categorias', [CCategoria::class, 'listar'])
    ->name('categorias.listar');

Route::post('/categorias/guardar', [CCategoria::class, 'guardar'])
    ->name('categorias.guardar');

Route::get('/categorias/editar/{id}', [CCategoria::class, 'obtener'])
    ->name('categorias.editar');

Route::put('/categorias/actualizar/{id}', [CCategoria::class, 'actualizar'])
    ->name('categorias.actualizar');

Route::delete('/categorias/eliminar/{id}', [CCategoria::class, 'eliminar'])
    ->name('categorias.eliminar');

Route::get('/productos', [CProducto::class, 'listar'])
    ->name('productos.listar');

Route::post('/productos/guardar', [CProducto::class, 'guardar'])->
    name('productos.guardar');

Route::get('/productos/editar/{id}', [CProducto::class, 'obtener'])
    ->name('productos.editar');

Route::put('/productos/actualizar/{id}', [CProducto::class, 'actualizar'])
    ->name('productos.actualizar');

Route::delete('/productos/eliminar/{id}', [CProducto::class, 'eliminar'])
    ->name('productos.eliminar');










Route::get('/{any}', function () {
    return redirect()->route('categorias.listar');
})->where('any', '.*');

