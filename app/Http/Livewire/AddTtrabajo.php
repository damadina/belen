<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categoria;
use App\Models\ttrabajo;
use App\Models\tdia;
use App\Models\User;

class AddTtrabajo extends Component
{
    public $openModal = false;

    public $categorias;

    public $trabajos;
    public $categoriaid=1;
    public $categoriaSelected;
    public $diaSelected;
    public $count = 1;
    public $Selects = [];



    public function mount( $diaSelected, $tipo=null) {

        $this->categorias = categoria::all();

        $this->categoriaSelected = categoria::find(1);
        $this->diaSelected = $diaSelected;


       /*  dd($diff->all()); */

    }
    public function render()
    {
        $trabajosAll = $this->categoriaSelected->trabajos;
        $trabajosSel = $this->diaSelected->trabajos;
        $this->trabajos = $trabajosAll->diff($trabajosSel);

        return view('livewire.add-ttrabajo');
    }

    public function updatedCategoriaid($categoria_id)
    {
        $this->categoriaSelected = categoria::find($categoria_id);
        $this->trabajos = $this->categoriaSelected->trabajos;

    }
    public function add(tdia $diaSelected ) {

    }
    public function clicAdd(tdia $dia) {

        $this->openModal = true;

    }



    public function confirmarAdd() {

        foreach($this->Selects as $each) {
            $this->diaSelected->trabajos()->attach([$each]);
        }
        $this->reset(['Selects','openModal']);
        $this->emitTo('admin-dia','render');


    }

    public function cancelar() {
        $this->openModal = false;
    }

}
