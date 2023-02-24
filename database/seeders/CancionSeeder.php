<?php

namespace Database\Seeders;

use App\Models\Cancion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $canciones = [
            [
                'nombre' => 'otra triste cancion de amor',
                'categoria_id' => 1
            ],
            [
                'nombre' => 'holiday',
                'categoria_id' => 1
            ],
            [
                'nombre' => 'enter sadman',
                'categoria_id' => 1
            ],
            [
                'nombre' => 'perfect',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'no me doy por vencido',
                'categoria_id' => 3
            ],
            [
                'nombre' => 'without me',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'adan y eva',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'akel pastel',
                'categoria_id' => 4
            ],
        ];

        foreach ($canciones as $cancion) {
            Cancion::create([
                'nombre' => $cancion['nombre'],
                'estado' => true,
                'categoria_id' => $cancion['categoria_id']
            ]);
        }
    }
}
