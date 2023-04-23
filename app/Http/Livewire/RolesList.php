<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class RolesList extends Component
{
    protected $listeners = ['delete','render'];
    public $permisos;
    public $roles;
    public $rol;
    public $open_edit = false;
    public $name;
    public $listaPermisos;


    protected function rules ()
    {
        return [
            'name' => [
                'required',
                'min:6',
                'max:50',
                Rule::unique('roles')->ignore($this->rol->id, 'id'),
            ],
        ];
    }

     protected $messages = [
        'name.unique' => 'Ya existe un rol con este nombre',
    ];






    public function mount() {
        $this->listaPermisos = Permission::all();
        $this->rol = new role();
    }


    public function render()
    {
        $this->roles = Role::all();
        return view('livewire.roles-list');
    }
    public function delete(Role $rol) {
        $rol->delete();
    }
    public function  edit(Role $rol ) {

        $this->rol= $rol;
        $this->permisos= $rol->permissions()->pluck('id');
        $this->name = $rol->name;
        $this->open_edit = true;
    }

    public function saveRol() {
        $this->validate();
        $this->rol->name = $this->name;
        $this->rol->save();
       /*  dd($this->roles); */

        $this->rol->permissions()->sync($this->permisos);

        $this->open_edit = false;
    }

}
