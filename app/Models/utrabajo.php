<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class utrabajo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function tareas() {
        return $this->hasMany(Utarea::class)->orderBy('orden');
    }
    public function jornada() {
        return $this->belongsTo(Jornada::class);
    }
    public function getHorasAttribute() {
        $tiempo = $this->tiempoestimado;
        $horas = floor($tiempo/3600);
        $minutos = floor(($tiempo-($horas*3600))/60);
        if ($minutos > 30) {
            $horas = $horas + 1;
        }
        $segundos = $tiempo-($horas*3600)-($minutos*60);

        return $horas.' Horas ';
    }
    public function getCreadoAttribute() {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y');
       return $date;
    }

}
