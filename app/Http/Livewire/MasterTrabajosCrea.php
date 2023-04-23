<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categoria;
use App\Models\mtipotrabajo;

class MasterTrabajosCrea extends Component
{
    public $categorias;
    public $categoriaSelect;
    public $trabajos;
    public $modalOpen = false;
    public $nombreTipoTrabajo;
    public $name;

    protected $listeners = ['deleteTrabajo'];

    protected $rules = [
        'name' => 'required|string|max:150',
    ];


    public function mount() {
        $this->categorias = categoria::all();
        $this->trabajos = mtipotrabajo::all();

    }



    public function render()
    {
        return view('livewire.master-trabajos-crea');
    }
    public function updatedcategoriaSelect() {
        if ($this->categoriaSelect == 0) {
            $this->trabajos = mtipotrabajo::all();
        } else {
            $this->trabajos = mtipotrabajo::where('categoria_id',$this->categoriaSelect)->get();
        }
    }
    public function openModal() {
        $this->resetValidation();
        $this->modalOpen = true;
    }
    public function deleteTrabajo(mtipotrabajo $trabajo) {
       $trabajo->delete();
       if ($this->categoriaSelect == 0) {
        $this->trabajos = mtipotrabajo::all();
    } else {
        $this->trabajos = mtipotrabajo::where('categoria_id',$this->categoriaSelect)->get();
    }

    }

    public function saveTrabajo(){

        $this->validate();

        mtipotrabajo::create([
            'name' => $this->name,
            'categoria_id' => $this->categoriaSelect

        ]);

        $this->reset(['name','modalOpen']);
        $this->emitTo('master-trabajos-list','render2');



    }




}
