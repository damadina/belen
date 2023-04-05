<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jornada;
Use App\Models\Utrabajo;
Use App\Models\Utarea;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(PermisionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TdiaSeeder::class);
        /* $this->call(CategoriaSeeder::class);
        $this->call(TdiaSeeder::class);
        $this->call(TtrabajoSeeder::class);
        $this->call(TtareaSeeder::class); */
        /* $this->call(diasTrabajosSeeder::class); */


    }
}
