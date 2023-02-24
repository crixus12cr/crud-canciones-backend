<?php

namespace Database\Seeders;

use App\Models\Categoria;
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
        $categorias = [
            [
                'nombre' => 'Heavy Metal',
                'tipo_id' => 1
            ],
            [
                'nombre' => 'Punk',
                'tipo_id' => 1
            ],
            [
                'nombre' => 'Metal',
                'tipo_id' => 1
            ],
            [
                'nombre' => 'pinki',
                'tipo_id' => 2
            ],
            [
                'nombre' => 'banda',
                'tipo_id' => 3
            ],
            [
                'nombre' => 'Reagaeton',
                'tipo_id' => 4
            ],
            [
                'nombre' => 'Rap',
                'tipo_id' => 4
            ],
            [
                'nombre' => 'Trap',
                'tipo_id' => 4
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create([
                'nombre' => $categoria['nombre'],
                'estado' => true,
                'tipo_id' => $categoria['tipo_id']
            ]);
        }
    }
}
