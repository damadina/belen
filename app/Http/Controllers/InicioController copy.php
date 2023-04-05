<?php

namespace App\Http\Controllers;
Use App\Models\Jornada;
use App\Models\Utrabajo;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index($fecha = null)
    {

        $trabajador = auth()->user();

        if($trabajador->name == "Admin") {

            return redirect()->route('admin.home');
        }



        if ($fecha == null) {

            $fecha = now()->format('Y-m-d');
            $jornadas = $trabajador->jornadaHoy;

            if ($jornadas->count() == 0) {
                $jornada = null;
                $trabajos = null;

            } else {
                $jornada = $jornadas[0];
                $trabajos = $jornada->trabajos;
            }


        } else {
            $jornadas = $trabajador->jornadasDia;
            $jornada = Jornada::where([
                ['dia',$fecha],
                ['user_id',$trabajador->id]

                ])->first();
            $trabajos = $jornada->trabajos;


        }

        $dia = $jornada->dia;


        return view('inicio', compact('fecha','trabajador','jornada', 'trabajos','dia'));


    }

    public function trabajos(Utrabajo $trabajo) {

        $jornada = $trabajo->jornada;


        if (auth()->user()->id <> $jornada->user->id) {

            return redirect()->back();
        }

        return view('trabajos', compact('trabajo','jornada'));
    }

}
