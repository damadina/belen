<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProximosDias extends Controller
{
   public function index() {
    setlocale(LC_ALL,"es_ES");
    $user = auth()->user();
    $proximosDias = $user->jornadasProximas;

    return view('proximosdias',compact('proximosDias'));
   }
}
