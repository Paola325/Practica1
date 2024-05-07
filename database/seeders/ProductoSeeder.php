<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            ['nombre' => 'Playera Roja', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color rojo', 
            'cantidad' => 10, 'categoria_id' => 1, 'propietario_id' => 1],
            ['nombre' => 'Pantalón Azul', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color azul', 
            'cantidad' => 5, 'categoria_id' => 2, 'propietario_id' => 2],
            ['nombre' => 'Vestido Floral', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido con estampado floral', 
            'cantidad' => 8, 'categoria_id' => 3, 'propietario_id' => 3],
            ['nombre' => 'Camisa Blanca', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color blanco', 
            'cantidad' => 7, 'categoria_id' => 4, 'propietario_id' => 4],
            ['nombre' => 'Traje Negro', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje elegante de color negro', 
            'cantidad' => 6, 'categoria_id' => 5, 'propietario_id' => 5],
            ['nombre' => 'Playera Negra', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color negro', 
            'cantidad' => 12, 'categoria_id' => 1, 'propietario_id' => 6],
            ['nombre' => 'Pantalón Gris', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color gris', 
            'cantidad' => 4, 'categoria_id' => 2, 'propietario_id' => 7],
            ['nombre' => 'Vestido Rojo', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido de color rojo', 
            'cantidad' => 9, 'categoria_id' => 3, 'propietario_id' => 8],
            ['nombre' => 'Camisa Azul', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color azul', 
            'cantidad' => 6, 'categoria_id' => 4, 'propietario_id' => 1],
            ['nombre' => 'Traje Gris', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje elegante de color gris', 
            'cantidad' => 7, 'categoria_id' => 5, 'propietario_id' => 10],        
            ['nombre' => 'Playera Verde', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color verde', 
            'cantidad' => 8, 'categoria_id' => 1, 'propietario_id' => 11],
            ['nombre' => 'Pantalón Negro', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color negro', 
            'cantidad' => 5, 'categoria_id' => 2, 'propietario_id' => 12],
            ['nombre' => 'Vestido Azul', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido de color azul', 
            'cantidad' => 7, 'categoria_id' => 3, 'propietario_id' => 13],
            ['nombre' => 'Camisa Rosa', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color rosa', 
            'cantidad' => 6, 'categoria_id' => 4, 'propietario_id' => 14],
            ['nombre' => 'Traje Azul Marino', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje elegante de color azul marino', 
            'cantidad' => 5, 'categoria_id' => 5, 'propietario_id' => 15],
            ['nombre' => 'Playera Blanca', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color blanco', 
            'cantidad' => 10, 'categoria_id' => 1, 'propietario_id' => 11],
            ['nombre' => 'Pantalón Café', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color café', 
            'cantidad' => 4, 'categoria_id' => 2, 'propietario_id' => 1],
            ['nombre' => 'Vestido Negro', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido de color negro', 
            'cantidad' => 8, 'categoria_id' => 3, 'propietario_id' => 2],
            ['nombre' => 'Camisa Verde', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color verde', 
            'cantidad' => 5, 'categoria_id' => 4, 'propietario_id' => 13],
            ['nombre' => 'Traje Beige', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje elegante de color beige', 
            'cantidad' => 6, 'categoria_id' => 5, 'propietario_id' => 14],
            ['nombre' => 'Playera Amarilla', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color amarillo', 
            'cantidad' => 9, 'categoria_id' => 1, 'propietario_id' => 15],
            ['nombre' => 'Pantalón Blanco', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color blanco', 
            'cantidad' => 6, 'categoria_id' => 2, 'propietario_id' => 6],
            ['nombre' => 'Vestido Morado', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido de color morado', 
            'cantidad' => 7, 'categoria_id' => 3, 'propietario_id' => 3],
            ['nombre' => 'Camisa Negra', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color negro', 
            'cantidad' => 8, 'categoria_id' => 4, 'propietario_id' => 14],
            ['nombre' => 'Traje Marrón', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje elegante de color marrón', 
            'cantidad' => 5, 'categoria_id' => 5, 'propietario_id' => 5],
            ['nombre' => 'Playera Naranja', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color naranja', 
            'cantidad' => 8, 'categoria_id' => 1, 'propietario_id' => 6],
            ['nombre' => 'Pantalón Azul Marino', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color azul marino', 
            'cantidad' => 6, 'categoria_id' => 2, 'propietario_id' => 2],
            ['nombre' => 'Vestido Verde', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido de color verde', 
            'cantidad' => 9, 'categoria_id' => 3, 'propietario_id' => 12],
            ['nombre' => 'Camisa Gris', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color gris', 
            'cantidad' => 7, 'categoria_id' => 4, 'propietario_id' => 1],
            ['nombre' => 'Traje Negro Formal', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje formal de color negro', 
            'cantidad' => 6, 'categoria_id' => 5, 'propietario_id' => 3],
            ['nombre' => 'Playera Rosa', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color rosa', 
            'cantidad' => 9, 'categoria_id' => 1, 'propietario_id' => 11],
            ['nombre' => 'Pantalón Rojo', 'estado' => 'consignado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color rojo', 
            'cantidad' => 7, 'categoria_id' => 2, 'propietario_id' => 12],
            
            ['nombre' => 'Vestido Azul Claro',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido de color azul claro', 
            'cantidad' => 8, 'categoria_id' => 3, 'propietario_id' => 3],
            ['nombre' => 'Camisa Amarilla',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color amarillo', 
            'cantidad' => 6, 'categoria_id' => 4, 'propietario_id' => 14],
            ['nombre' => 'Traje Azul Claro',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje elegante de color azul claro', 
            'cantidad' => 5, 'categoria_id' => 5, 'propietario_id' => 5],
            ['nombre' => 'Playera Gris',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color gris', 
            'cantidad' => 10, 'categoria_id' => 1, 'propietario_id' => 11],
            ['nombre' => 'Pantalón Morado',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color morado', 
            'cantidad' => 5, 'categoria_id' => 2, 'propietario_id' => 14],
            ['nombre' => 'Vestido Blanco',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido de color blanco', 
            'cantidad' => 9, 'categoria_id' => 3, 'propietario_id' => 8],
            ['nombre' => 'Camisa Naranja',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color naranja', 
            'cantidad' => 7, 'categoria_id' => 4, 'propietario_id' => 9],
            ['nombre' => 'Traje Azul Oscuro',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje elegante de color azul oscuro', 
            'cantidad' => 6, 'categoria_id' => 5, 'propietario_id' => 4],
            ['nombre' => 'Playera Celeste',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color celeste', 
            'cantidad' => 8, 'categoria_id' => 1, 'propietario_id' => 1],
            ['nombre' => 'Pantalón Verde Oliva',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color verde oliva', 
            'cantidad' => 6, 'categoria_id' => 2, 'propietario_id' => 2],
            ['nombre' => 'Vestido Amarillo',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido de color amarillo', 
            'cantidad' => 7, 'categoria_id' => 3, 'propietario_id' => 3],
            ['nombre' => 'Camisa Roja',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color rojo', 
            'cantidad' => 6, 'categoria_id' => 4, 'propietario_id' => 4],
            ['nombre' => 'Traje Blanco',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje elegante de color blanco', 
            'cantidad' => 5, 'categoria_id' => 5, 'propietario_id' => 5],
            ['nombre' => 'Playera Azul Marino',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una playera de color azul marino', 
            'cantidad' => 9, 'categoria_id' => 1, 'propietario_id' => 6],
            ['nombre' => 'Pantalón Rosa',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un pantalón de color rosa', 
            'cantidad' => 5, 'categoria_id' => 2, 'propietario_id' => 7],
            ['nombre' => 'Vestido Naranja',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un vestido de color naranja', 
            'cantidad' => 8, 'categoria_id' => 3, 'propietario_id' => 5],
            ['nombre' => 'Camisa Azul Claro',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Una camisa de color azul claro', 
            'cantidad' => 7, 'categoria_id' => 4, 'propietario_id' => 4],
            ['nombre' => 'Traje Gris Oscuro',
            'fecha_publicacion' => '2024-05-04', 
            'descripcion' => 'Un traje elegante de color gris oscuro', 
            'cantidad' => 6, 'categoria_id' => 5, 'propietario_id' => 10]
        ];

        foreach ($productos as $producto) {
            $nuevo = new Producto();
            $nuevo->fill($producto);
            $nuevo->save();
        }
    }
}
