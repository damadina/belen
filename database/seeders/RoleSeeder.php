<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'Administrador'
        ]);

        $role->permissions()->attach([1,2,3,4,5,6]);

        /* $role = Role::create([
            'name' => 'Trabajador'
        ]);

        $role->permissions()->attach([7,8]); */

    }
}
