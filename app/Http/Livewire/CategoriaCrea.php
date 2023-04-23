<?php

namespace App\Http\Livewire;

use App\Models\categoria;
use Livewire\Component;

class CategoriaCrea extends Component
{
    public $modalOn = false;
    public $name;


     protected $rules = [
        'name' => 'required|string|max:50|unique:categorias',
     ];
     protected $messages = [
        'name.unique' => 'Ya existe una Categoría con este nombre',
    ];


    public function render()
    {
        return view('livewire.categoria-crea');
    }
    public function openModal() {
       /*  $this->resetValidation(); */
        $this->modalOn = true;
    }

    public function saveCategoria() {
        $this->validate();
        categoria::create([
            'name' => $this->name
        ]);
        $this->reset(['modalOn','name']);
        $this->emitTo('categoria-list','render');

    }
}
