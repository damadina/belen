<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categoria;
use App\Models\mtipotrabajo;

class MasterTrabajosList extends Component
{

    public $categorias;
    public $categoriaSelect;
    public $trabajos;
    public $modalOpen = false;
    public $nombreTipoTrabajo;
    public $name;

    protected $listeners = ['deleteTrabajo','render2'];






    public function mount() {

        $this->categorias = categoria::all();
        $this->trabajos = mtipotrabajo::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {

        return view('livewire.master-trabajos-list');
    }
    public function render2() {
        $this->categoriaSelect = "0";
        $this->trabajos = mtipotrabajo::orderBy('created_at', 'desc')->get();
        $this->render();
    }

    public function updatedcategoriaSelect() {

        if ($this->categoriaSelect == 0) {
            $this->trabajos = mtipotrabajo::all();
        } else {
            $this->trabajos = mtipotrabajo::where('categoria_id',$this->categoriaSelect)->get();
        }
    }
    public function deleteTrabajo(mtipotrabajo $trabajo) {
        $trabajo->delete();
        if ($this->categoriaSelect == 0) {
         $this->trabajos = mtipotrabajo::all();
        } else {
            $this->trabajos = mtipotrabajo::where('categoria_id',$this->categoriaSelect)->get();
        }

     }


}
