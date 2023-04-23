<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoria;
use Illuminate\Http\Request;


class CategoriaController extends Controller
{

    public function __invoke()
    {
        $categorias = categoria::all();
        return view('admin.categorias.index',compact('categorias'));
    }


}
