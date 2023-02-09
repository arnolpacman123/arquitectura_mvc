<?php

namespace Database\Seeders;

use App\Models\MCategoria;
use App\Models\MProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bebida = MCategoria::where('nombre', 'Bebidas')->first();
        $comida = MCategoria::where('nombre', 'Comida')->first();
        $postre = MCategoria::where('nombre', 'Postres')->first();
        $ropa = MCategoria::where('nombre', 'Ropa')->first();
        $tecnologia = MCategoria::where('nombre', 'Tecnología')->first();
        $juguete = MCategoria::where('nombre', 'Juguetes')->first();

        $bebidas_array = [
            [
                'nombre' => 'Coca-Cola',
                'descripcion' => 'Bebida gaseosa',
                'precio' => 10,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Pepsi',
                'descripcion' => 'Bebida gaseosa',
                'precio' => 10,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Fanta',
                'descripcion' => 'Bebida gaseosa',
                'precio' => 10,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Sprite',
                'descripcion' => 'Bebida gaseosa',
                'precio' => 10,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Manzanita',
                'descripcion' => 'Bebida gaseosa',
                'precio' => 10,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Cerveza',
                'descripcion' => 'Bebida alcohólica',
                'precio' => 20,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Ron',
                'descripcion' => 'Bebida alcohólica',
                'precio' => 20,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Vodka',
                'descripcion' => 'Bebida alcohólica',
                'precio' => 20,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Tequila',
                'descripcion' => 'Bebida alcohólica',
                'precio' => 20,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Whisky',
                'descripcion' => 'Bebida alcohólica',
                'precio' => 20,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Agua',
                'descripcion' => 'Bebida no alcohólica',
                'precio' => 5,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Jugo',
                'descripcion' => 'Bebida no alcohólica',
                'precio' => 5,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Refresco',
                'descripcion' => 'Bebida no alcohólica',
                'precio' => 5,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Té',
                'descripcion' => 'Bebida no alcohólica',
                'precio' => 5,
                'categoria_id' => $bebida->id,
            ],
            [
                'nombre' => 'Café',
                'descripcion' => 'Bebida no alcohólica',
                'precio' => 5,
                'categoria_id' => $bebida->id,
            ],
        ];
        $comidas_array = [
            [
                'nombre' => 'Hamburguesa',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Pizza',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Hot Dog',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Papas fritas',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Tacos',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Enchiladas',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Tortas',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Sushi',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Burritos',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Tostadas',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
            [
                'nombre' => 'Tamales',
                'descripcion' => 'Comida rápida',
                'precio' => 20,
                'categoria_id' => $comida->id,
            ],
        ];
        $postres_array = [
            [
                'nombre' => 'Pastel',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Gelatina',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Flan',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Tres leches',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Pay',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Tarta',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Mousse',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Helado',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Tiramisú',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Brownie',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
            [
                'nombre' => 'Cheesecake',
                'descripcion' => 'Postre',
                'precio' => 20,
                'categoria_id' => $postre->id,
            ],
        ];
        $ropas_array = [
            [
                'nombre' => 'Camisa',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
            [
                'nombre' => 'Pantalón',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
            [
                'nombre' => 'Chamarra',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
            [
                'nombre' => 'Sudadera',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
            [
                'nombre' => 'Blusa',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
            [
                'nombre' => 'Falda',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
            [
                'nombre' => 'Short',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
            [
                'nombre' => 'Bermuda',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
            [
                'nombre' => 'Chaqueta',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
            [
                'nombre' => 'Blusa',
                'descripcion' => 'Ropa',
                'precio' => 20,
                'categoria_id' => $ropa->id,
            ],
        ];
        $tecnologias_array = [
            [
                'nombre' => 'Celular',
                'descripcion' => 'Tecnología',
                'precio' => 1000,
                'categoria_id' => $tecnologia->id,
            ],
            [
                'nombre' => 'Tablet',
                'descripcion' => 'Tecnología',
                'precio' => 1200,
                'categoria_id' => $tecnologia->id,
            ],
            [
                'nombre' => 'Laptop',
                'descripcion' => 'Tecnología',
                'precio' => 4000,
                'categoria_id' => $tecnologia->id,
            ],
            [
                'nombre' => 'Audífonos',
                'descripcion' => 'Tecnología',
                'precio' => 40,
                'categoria_id' => $tecnologia->id,
            ],
            [
                'nombre' => 'Cargador',
                'descripcion' => 'Tecnología',
                'precio' => 70,
                'categoria_id' => $tecnologia->id,
            ],
            [
                'nombre' => 'Mouse',
                'descripcion' => 'Tecnología',
                'precio' => 80,
                'categoria_id' => $tecnologia->id,
            ],
            [
                'nombre' => 'Teclado',
                'descripcion' => 'Tecnología',
                'precio' => 100,
                'categoria_id' => $tecnologia->id,
            ],
            [
                'nombre' => 'Cámara',
                'descripcion' => 'Tecnología',
                'precio' => 150,
                'categoria_id' => $tecnologia->id,
            ],
            [
                'nombre' => 'Pantalla',
                'descripcion' => 'Tecnología',
                'precio' => 300,
                'categoria_id' => $tecnologia->id,
            ],
            [
                'nombre' => 'Bocinas',
                'descripcion' => 'Tecnología',
                'precio' => 100,
                'categoria_id' => $tecnologia->id,
            ],
        ];
        $juguetes_array = [
            [
                'nombre' => 'Pelota',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
            [
                'nombre' => 'Muñeca',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
            [
                'nombre' => 'Juego de mesa',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
            [
                'nombre' => 'Juego de cartas',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
            [
                'nombre' => 'Juego de construcción',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
            [
                'nombre' => 'Auto',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
            [
                'nombre' => 'Avión',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
            [
                'nombre' => 'Barco',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
            [
                'nombre' => 'Tren',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
            [
                'nombre' => 'Camión',
                'descripcion' => 'Juguete',
                'precio' => 20,
                'categoria_id' => $juguete->id,
            ],
        ];
        MProducto::insert($bebidas_array);
        MProducto::insert($comidas_array);
        MProducto::insert($ropas_array);
        MProducto::insert($tecnologias_array);
        MProducto::insert($juguetes_array);
    }
}
