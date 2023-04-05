<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PhpParser\Builder\Function_;
use App\Models\jornada;

class AdminVerPartes extends Component
{
    public $fechaDesde;
    public $jornadas;
    public function mount() {
        $this->fechaDesde = \Carbon\Carbon::now()->format('Y-m-d');
        $this->jornadas = jornada::where("dia",$this->fechaDesde)->get();


    }

    public function render()
    {
        return view('livewire.admin-ver-partes');
    }
    public function updatedFechaDesde () {
        $this->jornadas = jornada::where("dia",$this->fechaDesde)->get();
    }
}
