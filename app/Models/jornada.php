<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jornada extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function trabajos() {
        return $this->hasMany(Utrabajo::class)->orderBy('orden');
    }
}
