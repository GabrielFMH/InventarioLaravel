<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('products')->insert([
            [
                'nombre' => 'Producto 1',
                'stock' => 10,
                'precio' => 99.99,
                'descripcion' => 'Descripción del producto 1',
            ],
            [
                'nombre' => 'Producto 2',
                'stock' => 20,
                'precio' => 149.99,
                'descripcion' => 'Descripción del producto 2',
            ],
            [
                'nombre' => 'Producto 3',
                'stock' => 5,
                'precio' => 59.99,
                'descripcion' => 'Descripción del producto 3',
            ],
        ]);
    }
}
