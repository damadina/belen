<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DateTime;
use DateInterval;
use DatePeriod;
use App\Models\jornada;
use App\Models\tdia;
use App\Models\User;
use App\Models\utarea;
use Illuminate\Database\Eloquent\Builder;
use App\Models\utrabajo;


class AdminGenera extends Component
{
    public $fechaDesde;
    public $fechaHasta;
    public $fechaDesdeMax;
    public $fechaDesdeMin;
    public $fechaHastaMax;
    public $fechaHastaMin;
    public $range;
    public $confirmationMensage;
    public $okPlantillas;
    public $message;
    protected $listeners = ['genera'];

    public function mount() {
        $this->fechaDesde = \Carbon\Carbon::now()->addDays(1)->format('Y-m-d');
        $this->fechaHasta =$this->fechaDesde;
        $this->fechaDesdeMin = \Carbon\Carbon::now()->addDays(1)->format('Y-m-d');
        $this->fechaDesdeMax =  \Carbon\Carbon::now()->addDays(7)->format('Y-m-d');
        $this->fechaHastaMin = \Carbon\Carbon::createFromDate($this->fechaDesde)->addDays(1)->format('Y-m-d');
        $this->fechaHastaMax = \Carbon\Carbon::createFromDate($this->fechaHastaMin)->addMonth()->format('Y-m-d');
        $this->range = $this->getRangeDate($this->fechaDesde, $this->fechaHasta, 'Y-m-d');
        //comprobar estado de Plantillas
        if(!$this->estadoPlantillas()){
            $this->okPlantillas = "disabled";
            $this->message = "Añade trabajos para cada día y asignalos a un trabajador";
        } else {
            $this->okPlantillas = "";
        }
    }

    public function render()
    {

        return view('livewire.admin-genera');
    }

    public function updatedFechaDesde($fecha) {
        $this->fechaHastaMin = \Carbon\Carbon::createFromDate($this->fechaDesde)->addDays(1)->format('Y-m-d');
        $this->fechaHastaMax = \Carbon\Carbon::createFromDate($this->fechaHastaMin)->addMonth()->format('Y-m-d');
        $this->range = $this->getRangeDate($this->fechaDesde, $this->fechaHasta, 'Y-m-d');
    }
    public function updatedFechaHasta($fecha) {
        $this->range = $this->getRangeDate($this->fechaDesde, $this->fechaHasta, 'Y-m-d');
    }





    public function genera() {




        foreach ($this->range as $eachRange) {
            // Eliminar todas las joradas (de todos los usuarios) para ese día
            $this->eliminaJornadas($eachRange);

            // obtiene el dia numerico de la semana //
            $diaSemana = date('w', strtotime($eachRange));
            $diaSemana +=1; //El domigo es 0
            $plantilla = tdia::find($diaSemana);

            //obtener todos los trabajos de la Platilla
            $trabajos = $plantilla->trabajos;
            foreach($trabajos as $eachTrabajo) {
                // comprobar si el trabajador tiene creada la jornada para ese día. Sino la crea
                $trabajador = $eachTrabajo->trabajador;
                $jornada = $this->trataJornada($trabajador, $eachRange);
                $this->message="Creando trabajo para ".$trabajador->name;
                $utrabajo = utrabajo::create([
                    'name' => $eachTrabajo->name,
                    'descripcion' => $eachTrabajo->descripcion,
                    'obsevaciones' => $eachTrabajo->observaciones,
                    'tiempoestimado' => $eachTrabajo->tiempoestimado,
                    'importante' =>false,
                    'jornada_id' => $jornada->id
                ]);

                $tareas = $eachTrabajo->tareas;

                foreach($tareas as $eachTarea) {
                    $this->message="Creando tarea para ".$trabajador->name;
                    utarea::create([
                        'name' => $eachTarea->name,
                        'descripcion' => $eachTarea->descripcion,
                        'observaciones' => $eachTarea->observaciones,
                        'utrabajo_id' => $utrabajo->id

                    ]);

                }

            }




        }

        $this->message="Generación de partes realizada con éxito";




    }

    function eliminaJornadas($dia) {
        $this->message="Eliminando jornadas";
        $jornadas = jornada::where('dia',$dia)->get();

        foreach($jornadas as $eachJornada) {
            $eachJornada->delete();
        }

    }

    function trataJornada(user $trabajador, $dia) {
        $this->message="Creando jornada ".$trabajador->name;;
        $jornada = jornada::where([
            ['user_id',$trabajador->id],
            ['dia',$dia]

        ])->first();

       if(!$jornada) {

            $jornada = jornada::create([
                    'dia' => $dia,
                    'observaciones' => null,
                    'importante' => true,
                    'user_id' => $trabajador->id
                    ]);
        }
        return  $jornada;
    }


    function getRangeDate($date_ini, $date_end, $format) {

        $dt_ini = DateTime::createFromFormat($format, $date_ini);
        $dt_end = DateTime::createFromFormat($format, $date_end);
        $period = new DatePeriod(
            $dt_ini,
            new DateInterval('P1D'),
            $dt_end,
        );
        $range = [];
        foreach ($period as $date) {
            $range[] = $date->format($format);
        }
        $range[] = $date_end;
        $this->confirmationMensage ="";
        foreach($range as $each) {
            $this->confirmationMensage .= $each.'  ';
        }
        return $range;
    }

    function estadoPlantillas() {
        $tdias = tdia::all();

        foreach($tdias as $eachTdia) {

            $trabajos = $eachTdia->trabajos;
            if($trabajos->count() == 0) {
                return false;
            }

            foreach($trabajos as $eachTrabajo) {

                if($eachTrabajo->trabajador == null) {

                        return false;
                }


            }

        }
        return true;

    }


}

