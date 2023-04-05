<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ttarea extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function trabajo() {
        return $this->belongsTo(Ttrabajo::class);
    }
}
