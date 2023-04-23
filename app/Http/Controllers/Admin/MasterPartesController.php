<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mtipotrabajo;
class MasterPartesController extends Controller
{
    public function __invoke(mtipotrabajo $trabajo)
    {
        return view('admin.partes.index',compact('trabajo'));

    }
}
