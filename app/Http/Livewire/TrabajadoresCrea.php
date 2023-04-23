<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class TrabajadoresCrea extends Component
{
    public $modalOn = false;
    public $listaRoles;
    public $roles= [];
    public $name,$email,$password,$password_confirmation;

    protected $rules = [
        'name' => 'required|min:8|max:50|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed'
     ];
     protected $messages = [
        'name.unique' => 'Ya existe un trabajador con este nombre',
        'email.unique' => 'Ya existe un trabajador con este correo electrónico',
    ];


    public function mount() {
        $this->listaRoles = Role::all();
    }


    public function render()
    {
        return view('livewire.trabajadores-crea');
    }
    public function openModal() {
        /*  $this->resetValidation(); */
         $this->modalOn = true;
     }

    public function saveTrabajador() {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        $user->roles()->sync($this->roles);
        $this->reset(['modalOn','name','email','password','password_confirmation','roles']);
        $this->emitTo('trabajadores-list','render');



    }
}
