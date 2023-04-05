<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tdia;

class TdiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tdia::create([
            'dia' => 'Domingo',
        ]);
        tdia::create([
            'dia' => 'Lunes',
        ]);
        tdia::create([
            'dia' => 'Martes',
        ]);
        tdia::create([
            'dia' => 'Miercoles',
        ]);
        tdia::create([
            'dia' => 'Jueves',
        ]);
        tdia::create([
            'dia' => 'Viernes',
        ]);
        tdia::create([
            'dia' => 'Sábado',
        ]);
    }
}
