<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\tdia;
use App\Models\categoria;

class Inicializa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

      if(User::all()->count() ==0) {
        $this->generateAdmin();
      }

    return $next($request);
    }


    public function generateAdmin() {
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

        $role = Role::create([
            'name' => 'Administrador'
        ]);
        $role->permissions()->attach([1,2,3,4,5,6]);

        $role = Role::create([
            'name' => 'Trabajador'
        ]);
        $role->permissions()->attach([7,8]);




        $user = new User();
        $user->name ='Admin';
        $user->email= 'admin@ecuestre.com';
        $user->password =bcrypt('12345678');
        $user->save();


        $user->roles()->sync(1);

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

        categoria::create([
            'name' =>  'Sin categoría '
       ]);





    }
}
