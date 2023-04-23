<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesCrea extends Component
{
    public $modalOn = false;
    public $listaPermisos;
    public $name;
    public $permisos = [];

    protected $rules = [
        'name' => 'required|min:6|max:50|unique:roles'
     ];
     protected $messages = [
        'name.unique' => 'Ya existe un rol con este nombre',

    ];




    public function mount() {
        $this->listaPermisos = Permission::all();
    }


    public function render()
    {
        return view('livewire.roles-crea');
    }
    public function openModal() {
        $this->modalOn = true;
    }
    public function saveRol() {
        $this->validate();
        $role = Role::create([
            'name' => $this->name,
        ]);
        $role->permissions()->sync($this->permisos);

        $this->emitTo('roles-list','render');
        $this->reset(['modalOn','name']);
    }
}
