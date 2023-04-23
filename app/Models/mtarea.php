<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mtarea extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //  Relacion muchos a muchos
    public function dias() {
        return $this->belongsToMany(mdias::class,'mdia_mtrabajo_user')->withTimestamps()->withPivot(['user_id']);
    }
    public function user() {
        return $this->belongsToMany(user::class,'mdia_mtrabajo_user')->withTimestamps()->withPivot(['user_id']);
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


}
