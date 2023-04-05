<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class ttrabajo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function tareas() {
        return $this->hasMany(Ttarea::class);
    }
    public function categoria() {
        return $this->belongsTo(categoria::class);
    }
    //  Relacion muchos a muchos
    public function dias() {
        return $this->belongsToMany(tdia::class,'tdia_ttrabajo_user')->withTimestamps()->withPivot(['user_id']);
    }
    public function user() {
        return $this->belongsToMany(user::class,'tdia_ttrabajo_user')->withTimestamps()->withPivot(['user_id']);
    }

    public function getTrabajadorAttribute()
    {
        if($this->pivot->user_id == null) {
            return null;
        } else {
            $user = user::findOrFail($this->pivot->user_id);
            return $user;
        }



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


    public function getCategoriaNameAttribute() {
        $categoria = $this->categoria;
       return $categoria->name;
    }
    public function getSelectAttribute() {
       return "Selected";
    }

}
