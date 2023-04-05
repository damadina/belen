<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Permission::create([
            'name' => 'Admin: Ver panel Administración',
        ]);

        Permission::create([
            'name' => 'Admin: Crear Roles',
        ]);
        Permission::create([
            'name' => 'Admin: Crear Categorias',
        ]);
        Permission::create([
            'name' => 'Admin: Crear Trabajador',
        ]);
        Permission::create([
            'name' => 'Admin: Crear Plantillas',
        ]);
        Permission::create([
            'name' => 'Gestor: Asignar Trabajos',
        ]);
        Permission::create([
            'name' => 'Trabajador: Reportar incidencias',
        ]);
        Permission::create([
            'name' => 'Trabajador: Ver proximos partes',
        ]);

    }
}
