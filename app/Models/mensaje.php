<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class mensaje extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getCreadoAttribute() {
        $date = Carbon::createFromFormat('Y-m-d', $this->dia)->format('d-m-Y');
       return $date;
    }

}

