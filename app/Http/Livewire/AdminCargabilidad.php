<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\tdia;

class AdminCargabilidad extends Component
{
    public $openModal;
    public $dia;
    public $lista;


    public function mount($dia) {
        $this->dia = $dia;
    }

    public function render()
    {

        return view('livewire.admin-cargabilidad');
    }
    public function ver() {

        $diaTrabajo = tdia::find($this->dia);
        $trabajos = $diaTrabajo->trabajos;
        $lista = [];
        foreach($trabajos as $each) {
            if(!$each->trabajador) {
                continue;
            }
            if(isset($lista[$each->trabajador->name])) {
                $segundos = $lista[$each->trabajador->name] + $each->tiempoestimado;
                $lista[$each->trabajador->name] = $segundos;
            } else {
                $lista[$each->trabajador->name] = $each->tiempoestimado;
            }

        }
        arsort($lista);
        foreach($lista as $key => $each) {

            $tiempo = $each;
            $horas = floor($tiempo/3600);
            $minutos = floor(($tiempo-($horas*3600))/60);
            if ($minutos > 30) {
                $horas = $horas + 1;
            }
            $lista[$key] = $horas;




        }



        $this->lista = $lista;

        $this->openModal = true;
    }
    public function cerrar() {
        $this->openModal = false;
    }
}
