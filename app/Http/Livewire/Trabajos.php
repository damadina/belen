<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Utrabajo;
use App\Models\Utarea;
use Nette\Utils\DateTime;

class Trabajos extends Component
{
    public $trabajo;
    public $tareas;
    public $tarea;
    public $botonInicio = "iniciar";
    public $botonFin = "Finalizar";
    public $dia;
    public $modeEdit = true;
    protected $listeners = ['render'];

    protected $rules = [
        'tarea.botonIniciar' => 'required',
        'tarea.botonFinalizar' => 'required',
        'tarea.botonParar' => 'required',
        'tarea.inicio' => 'required',
        'tarea.fin' => 'required',
        'tarea.ultimaParada' => 'required',
        'tarea.totalParada' => 'required'

    ];
    public function mount($trabajo, $dia) {
        $this->trabajo = $trabajo;
        $this->tareas = $trabajo->tareas;
        $this->tarea = new Utarea();
        $this->dia = $dia;



    }


    public function render()
    {
        return view('livewire.trabajos');

    }
    public function cambiaEstado(Utarea $tarea, $tipo) {

        switch ($tipo) {
            case "Iniciar":
                $tarea->botonIniciar = "Iniciado";
                $idate = date('H:i');
                $tarea->inicio = $idate;
                break;
            case "Parar":
                $tarea->botonParar = "Reanudar";
                $idate = date('H:i');
                $tarea->ultimaParada = $idate;
                break;
            case "Reanudar":
                $tarea->botonParar = "Parar";
                // Calcuar tiempo parado
                $ultimaParada = new DateTime($tarea->ultimaParada);
                $reanudado = new DateTime();
                $seconds= strtotime($reanudado) - strtotime($ultimaParada);
                // Acumular tiempo parado
                $acumulado = $tarea->totalParado;
                $acumulado = $acumulado + $seconds;
                $tarea->totalParado = $acumulado;
                $tarea->ultimaParada = null;


                break;
            case "Finalizar":
                $tarea->botonFinalizar = "Finalizado";
                $nowDate = date('H:i');
                $tarea->fin = $nowDate;
                break;

        }
        $this->tarea = $tarea;
        $this->tarea->save();

        $this->tarea = new Utarea();
        $this->trabajo = Utrabajo::find($this->trabajo->id);
        $this->tareas = $this->trabajo->tareas;
    }
}
