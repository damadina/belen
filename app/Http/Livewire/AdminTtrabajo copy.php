<?php

namespace App\Http\Livewire;

use App\Models\categoria;
use Livewire\Component;
use App\Models\ttrabajo;
use Livewire\WithPagination;

class AdminTtrabajo extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search ="";
    public $categoaria_id = 0;
    public $categorias;

    public function mount()
    {
        $categorias = categoria::all();
        $this->categorias = $categorias;
    }


    public function render()
    {
        if ($this->categoaria_id == 0) {
            $plantillas = TTrabajo::paginate(8);
        } else {
            $plantillas = TTrabajo::where('categoria_id',$this->categoaria_id)
                ->paginate(8);
        }

        return view('livewire.admin-ttrabajo',compact('plantillas'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
