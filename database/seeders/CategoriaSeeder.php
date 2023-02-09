<?php

namespace Database\Seeders;

use App\Models\MCategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MCategoria::create([
            'nombre' => 'Bebidas',
            'descripcion' => 'Bebidas alcohólicas y no alcohólicas',
        ]);

        MCategoria::create([
            'nombre' => 'Comida',
            'descripcion' => 'Comida rápida y comida para llevar',
        ]);

        MCategoria::create([
            'nombre' => 'Postres',
            'descripcion' => 'Postres y dulces',
        ]);

        MCategoria::create([
            'nombre' => 'Ropa',
            'descripcion' => 'Ropa para hombres, mujeres y niños',
        ]);

        MCategoria::create([
            'nombre' => 'Tecnología',
            'descripcion' => 'Tecnología para el hogar y para el trabajo',
        ]);

        MCategoria::create([
            'nombre' => 'Juguetes',
            'descripcion' => 'Juguetes para niños y niñas',
        ]);
    }
}
