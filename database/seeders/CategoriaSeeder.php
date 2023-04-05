<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\categoria;

class CategoriaSeeder extends Seeder
{

    public function run(): void
    {
        $numeroCategoarias = 10;
        for ($i = 1; $i <= $numeroCategoarias; $i++) {
           categoria::create([
                'name' =>  'Categoría '.$i
           ]);

         }
    }
}
