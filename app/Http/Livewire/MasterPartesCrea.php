<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\mtipotrabajo;
use App\Models\User;
use App\Models\mparte;

class MasterPartesCrea extends Component
{
    public $modalOpen = false;
    public $trabajo;



    public $tareas;

    public $name;
    public $descripcion;
    public $users;
    public $idAsignacion;
    public $showParame = true;
    public $tarea;

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



    protected $rules = [
        'tarea' => 'required|min:6|max:100'
     ];
     /* protected $messages = [
        'name.unique' => 'Ya existe un rol con este nombre',

    ]; */


    public function mount(mtipotrabajo $trabajo) {
        $this->trabajo = $trabajo;
        $this->users = User::role('trabajador')->get();
    }

    public function render()
    {
        return view('livewire.master-partes-crea');
    }

    public function openModal() {
        /* $this->resetValidation(); */
        $this->modalOpen = true;
    }
    public function saveParte() {
        $this->validate();

        mparte::create([
            'tarea' => $this->tarea,
            'tiempoEstimado' => $this->horas + $this->minutos,
            'lunes' => $this->lunes,
            'martes' => $this->martes,
            'miercoles' => $this->miercoles,
            'jueves' => $this->jueves,
            'viernes' => $this->viernes,
            'sabado' => $this->sabado,
            'domingo' => $this->domingo,
            'mensajeLunes' => $this->mensajeLunes,
            'importanteLunes' => $this->importanteLunes,
            'lunesTurno' => $this->lunesTurno,
            'rangeSliderLunes' => $this->rangeSliderLunes,

            'mensajeMartes' => $this->mensajeMartes,
            'importanteMartes' => $this->importanteMartes,
            'martesTurno' => $this->martesTurno,
            'rangeSliderMartes' => $this->rangeSliderMartes,


            'mensajeMiercoles' => $this->mensajeMiercoles,
            'importanteMiercoles' => $this->importanteMiercoles,
            'martesTurno' => $this->martesTurno,
            'rangeSliderMartes' => $this->rangeSliderMartes,


            'mensajeJueves' => $this->mensajeJueves,
            'importanteJueves' => $this->importanteJueves,
            'juevesTurno' => $this->juevesTurno,
            'rangeSliderJueves' => $this->rangeSliderJueves,

            'mensajeViernes' => $this->mensajeViernes,
            'importanteViernes' => $this->importanteViernes,
            'viernesTurno' => $this->viernesTurno,
            'rangeSliderViernes' => $this->rangeSliderViernes,

            'mensajeSabado' => $this->mensajeSabado,
            'importanteSabado' => $this->importanteSabado,
            'sabadoTurno' => $this->sabadoTurno,
            'rangeSliderSabado' => $this->rangeSliderSabado,

            'mensajeDomingo' => $this->mensajeDomingo,
            'importanteDomingo' => $this->importanteDomingo,
            'domingoTurno' => $this->domingoTurno,
            'rangeSliderDomingo' => $this->rangeSliderDomingo,

            'mtipotrabajo_id' => $this->trabajo->id,
        ]);
        $this->emitTo('master-partes-list','render');
        $this->modalOpen = false;
    }

}
