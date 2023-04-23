<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterTrabajosController extends Controller
{
    public function __invoke()
    {
        return view('admin.trabajos.index');

    }
}
