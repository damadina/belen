<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tdia extends Model
{
    use HasFactory;
    public function trabajos() {
        return $this->belongsToMany(ttrabajo::class,'tdia_ttrabajo_user')->withTimestamps()->withPivot(['user_id']);
    }


}
