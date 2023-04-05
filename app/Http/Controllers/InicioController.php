<?php

namespace App\Http\Controllers;
Use App\Models\Jornada;
use App\Models\Utrabajo;
use App\Models\mensaje;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index($fecha = null)
    {

        $trabajador = auth()->user();

        /* if($trabajador->name == "Admin") {

            return redirect()->route('admin.home');
        } */


       /*  $fecha = now()->format('Y-m-d'); */
        $fecha = now()->addDays(1)->format('Y-m-d');

        $mensaje = mensaje::where('dia',$fecha)->first();
        if ($mensaje) {
            $mensajeDia = $mensaje;
        } else {
            $mensajeDia = null;

        }


        $jornadas = $trabajador->jornadaHoy;
        $jornada = null;
        $trabajos = null;

        if (!$jornadas->count() == 0) {
            $jornada = $jornadas[0];
            $trabajos = $jornada->trabajos;
        }

        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        setlocale(LC_ALL,"es_ES.utf8");
        $fecha=date_create($fecha);

        $diaLetra = date_format($fecha,'w');
        $diaNumero = date_format($fecha,'d');
        $mes =  date_format($fecha,'n');
        $fechaFormateada = $diassemana[$diaLetra]." ".$diaNumero." de ".$meses[$mes-1];



        return view('inicio', compact('fecha','trabajador','jornada', 'trabajos', 'fechaFormateada','mensajeDia'));


    }

    public function trabajos(Utrabajo $trabajo) {

        $jornada = $trabajo->jornada;


        if (auth()->user()->id <> $jornada->user->id) {

            return redirect()->back();
        }

        return view('trabajos', compact('trabajo','jornada'));
    }

}
