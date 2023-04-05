<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ttarea;
use App\Models\ttrabajo;

class TtareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numeroTtareas = 200;
        for ($i = 1; $i <= $numeroTtareas; $i++) {
            $trabajo = ttrabajo::inRandomOrder()->first();
            ttarea::create([
                'name' => $trabajo->name.' Tarea'.$i,
                'descripcion' => "Descripción tarea ".$i,
                'observaciones' => 'Observaciones tarea '.$i,
                'orden' => 99,
                'ttrabajo_id' => $trabajo->id
            ]);

        }



    }
}
