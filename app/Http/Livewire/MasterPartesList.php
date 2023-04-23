<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\mtipotrabajo;
use App\Models\User;
use App\Models\mparte;

class MasterPartesList extends Component
{
    public $trabajo;
    public $partes;

    public $modalOpen = false;



    public $descripcion;
    public $users;
    public $idAsignacion;
    public $showParame = true;
    public $tareaObject;
    public $tarea;
    public $mensajeTarea;
    public $importanteMensaje = false;
    public $horas;
    public $minutos;
    public $domingo= [];
    public $lunes= [];
    public $martes= [];
    public $miercoles = [];
    public $jueves = [];
    public $viernes = [];
    public $sabado = [];

    public $mensajeLunes;
    public $importanteLunes = false;
    public $mensajeMartes;
    public $importanteMartes = false;
    public $mensajeMiercoles;
    public $importanteMiercoles = false;
    public $mensajeJueves;
    public $importanteJueves = false;
    public $mensajeViernes;
    public $importanteViernes = false;
    public $mensajeSabado;
    public $importanteSabado = false;
    public $mensajeDomingo;
    public $importanteDomingo = false;


    public $lunesTurno = 3;
    public $martesTurno = 3;
    public $miercolesTurno = 3;
    public $juevesTurno = 3;
    public $viernesTurno = 3;
    public $sabadoTurno = 3 ;
    public $domingoTurno = 3;




    public $rangeSliderLunes = 0;
    public $rangeSliderMartes = 0;
    public $rangeSliderMiercoles = 0;
    public $rangeSliderJueves = 0;
    public $rangeSliderViernes = 0;
    public $rangeSliderSabado = 0;
    public $rangeSliderDomingo = 0;




    protected $listeners = ['delete','render'];

    protected $rules = [
        'tarea' => 'required|min:6|max:100'
     ];




    public function mount(mtipotrabajo $trabajo) {
        $this->trabajo = $trabajo;

        $this->users = User::role('trabajador')->get();
    }

    public function render()
    {
        $this->partes = $this->trabajo->partes;

        return view('livewire.master-partes-list');
    }

    public function openModal() {
        /* $this->resetValidation(); */
        $this->modalOpen = true;
    }

    public function edit(mparte $tarea) {
        $segundos = $tarea->tiempoEstimado;

        $minutos = $segundos / 60;
        $horas = (int) floor($minutos / 60);
        $this->horas = $horas *3600;
        $segundos = $segundos - ($horas *3600);
        $this->minutos = $segundos;


        $this->tareaObject = $tarea;
        $this->tarea = $tarea->tarea;
        $this->mensajeTarea = $tarea->mensaje;
        $this->lunes = $tarea->lunes;
        $this->martes = $tarea->martes;
        $this->miercoles = $tarea->miercoles;
        $this->jueves = $tarea->jueves;
        $this->viernes = $tarea->viernes;
        $this->sabado = $tarea->sabado;
        $this->domingo = $tarea->doningo;

        $this->mensajeLunes = $tarea->mensajeLunes;
        $this->importanteLunes = $tarea->importanteLunes;
        $this->lunesTurno  = $tarea->lunesTurno;
        $this->rangeSliderLunes = $tarea->rangeSliderLunes;

        $this->mensajeMartes = $tarea->mensajeMartes;
        $this->importanteMartes = $tarea->importanteMartes;
        $this->martesTurno  = $tarea->martesTurno;
        $this->rangeSliderMartes = $tarea->rangeSliderMartes;

        $this->mensajeMiercoles = $tarea->mensajeMiercoles;
        $this->importanteMiercoles = $tarea->importanteMiercoles;
        $this->miercolesTurno  = $tarea->miercolesTurno;
        $this->rangeSliderMiercoles = $tarea->rangeSliderMiercoles;

        $this->mensajeJueves = $tarea->mensajeJueves;
        $this->importanteJueves = $tarea->importanteJueves;
        $this->juevesTurno  = $tarea->juevesTurno;
        $this->rangeSliderJueves = $tarea->rangeSliderJueves;

        $this->mensajeViernes = $tarea->mensajeViernes;
        $this->importanteViernes = $tarea->importanteViernes;
        $this->viernesTurno  = $tarea->viernesTurno;
        $this->rangeSliderViernes = $tarea->rangeSliderViernes;

        $this->mensajeSabado = $tarea->mensajeSabado;
        $this->importanteSabado = $tarea->importanteSabado;
        $this->sabadoTurno  = $tarea->sabadoTurno;
        $this->rangeSliderSabado = $tarea->rangeSliderSabado;


        $this->mensajeDomingo = $tarea->mensajeDomingo;
        $this->importanteDomingo = $tarea->importanteDomingo;
        $this->domingoTurno  = $tarea->domingoTurno;
        $this->rangeSliderDomingo = $tarea->rangeSliderDomingo;


        $this->modalOpen = true;
    }

    public function update() {

        $this->validate();

        $this->tareaObject->tarea = $this->tarea;
        $this->tareaObject->tiempoEstimado = $this->horas + $this->minutos;

        $this->tareaObject->lunes = $this->lunes;
        $this->tareaObject->martes = $this->martes;
        $this->tareaObject->miercoles = $this->miercoles;
        $this->tareaObject->jueves = $this->jueves;
        $this->tareaObject->viernes = $this->viernes;
        $this->tareaObject->sabado = $this->sabado;
        $this->tareaObject->domingo = $this->domingo;

        $this->tareaObject->mensajeLunes = $this->mensajeLunes;
        $this->tareaObject->importanteLunes = $this->importanteLunes;
        $this->tareaObject->lunesTurno = $this->lunesTurno;
        $this->tareaObject->rangeSliderLunes = $this->rangeSliderLunes;

        $this->tareaObject->mensajeMartes = $this->mensajeMartes;
        $this->tareaObject->importanteMartes = $this->importanteMartes;
        $this->tareaObject->martesTurno = $this->martesTurno;
        $this->tareaObject->rangeSliderMartes = $this->rangeSliderMartes;


        $this->tareaObject->mensajeMiercoles = $this->mensajeMiercoles;
        $this->tareaObject->importanteMiercoles = $this->importanteMiercoles;
        $this->tareaObject->miercolesTurno = $this->miercolesTurno;
        $this->tareaObject->rangeSliderMiercoles = $this->rangeSliderMiercoles;

        $this->tareaObject->mensajeJueves = $this->mensajeJueves;
        $this->tareaObject->importanteJueves = $this->importanteJueves;
        $this->tareaObject->juevesTurno = $this->juevesTurno;
        $this->tareaObject->rangeSliderJueves = $this->rangeSliderJueves;

        $this->tareaObject->mensajeViernes = $this->mensajeViernes;
        $this->tareaObject->importanteViernes = $this->importanteViernes;
        $this->tareaObject->viernesTurno = $this->viernesTurno;
        $this->tareaObject->rangeSliderViernes = $this->rangeSliderViernes;

        $this->tareaObject->mensajeSabado = $this->mensajeSabado;
        $this->tareaObject->importanteSabado = $this->importanteSabado;
        $this->tareaObject->sabadoTurno = $this->sabadoTurno;
        $this->tareaObject->rangeSliderSabado = $this->rangeSliderSabado;

        $this->tareaObject->mensajeDomingo = $this->mensajeDomingo;
        $this->tareaObject->importanteDomingo = $this->importanteDomingo;
        $this->tareaObject->domingoTurno = $this->domingoTurno;
        $this->tareaObject->rangeSliderDomingo = $this->rangeSliderDomingo;




        $this->tareaObject->mtipotrabajo_id = $this->trabajo->id;

        $this->tareaObject->save();
        $this->trabajo = mtipotrabajo::find($this->trabajo->id);



        $this->modalOpen = false;

    }
}
