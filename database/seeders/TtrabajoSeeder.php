<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ttrabajo;
use App\Models\categoria;

class TtrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ttrabajo::unsetEventDispatcher();
        $numeroPlantillas = 50;
        for ($i = 1; $i <= $numeroPlantillas; $i++) {

            ttrabajo::create([
                'name' => 'Plantilla de trabajo UUU'.$i,
                'descripcion' => "Descripción plantilla de trabajo".$i,
                'tiempoestimado' => rand(3600,28800),
                'observaciones' => 'Observaciones plantilla de trabajo'.$i,
                'orden' => 99,
                'categoria_id' => categoria::all()->random()->id
            ]);
        }
    }
}
