<?php

namespace App\Observers;
use App\Models\ttrabajo;
use App\Models\ttarea;

class ttrabajoObserver
{
    public function created(ttrabajo $trabajo) {

        ttarea::create([
            'name' => $trabajo->name,
            'descripcion' => $trabajo->descripcion,
            'ttrabajo_id' => $trabajo->id
        ]);

    }
}
