<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mparte extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'lunes' => 'array',
        'martes' => 'array',
        'miercoles' => 'array',
        'jueves' => 'array',
        'viernes' => 'array',
        'sabado' => 'array',
        'domingo' => 'array'
    ];
    public function tipoTrabajo() {
        return $this->belongsTo(mtipotrabajo::class);
    }
    public function getTiempoAttribute(){
        return $this->segundos_tiempo($this->tiempoEstimado);

    }


    public function segundos_tiempo($segundos) {
        $minutos = $segundos / 60;
        $horas = floor($minutos / 60);
        $minutos2 = $minutos % 60;
        $segundos_2 = $segundos % 60 % 60 % 60;
        if ($minutos2 < 10)
            $minutos2 = '0'.$minutos2;

        if ($segundos_2 < 10)
            $segundos_2 = '0'.$segundos_2;

        if ($segundos < 60) { /* segundos */
            $resultado = round($segundos).' Segundos';
        }
        elseif($segundos > 60 && $segundos < 3600) { /* minutos */
            $resultado = $minutos2
                .':'
                .$segundos_2
                .' Minutos';
        } else { /* horas */
            $resultado = $horas . ':' . $minutos2  . ' Horas';
        }

        return $resultado;
    }



}
