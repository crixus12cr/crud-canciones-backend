<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            'Rock',
            'Pop',
            'Balada',
            'Urbano'
        ];

        foreach ($tipos as $tipo) {
            Tipo::create([
                'nombre' => $tipo,
                'estado' => true
            ]);
        }
    }
}
