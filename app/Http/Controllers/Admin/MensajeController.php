<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mensaje;
use Illuminate\Validation\Rule;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = mensaje::all();

        return view('admin.mensajes.index',compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mensajes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'dia' => 'required|unique:mensajes',
            'mensaje' => 'required',
        ]);


        mensaje::create([
            'titulo' => $request->titulo,
            'dia' => $request->dia,
            'mensaje' => $request->mensaje
        ]);


        return redirect()->route('admin.mensajes.index')->with('info','El mensaje  se creo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mensaje $mensaje)
    {
        return view('admin.mensajes.edit',compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mensaje $mensaje)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'mensaje' => 'required',
            'dia' => ['required',Rule::unique('mensajes')->ignore($mensaje->id)]
        ]);


        $mensaje->update([
            'titulo' => $request->titulo,
            'dia' => $request->dia,
            'mensaje' => $request->mensaje
        ]);



        return redirect()->route('admin.mensajes.edit',$mensaje);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mensaje $mensaje)
    {
        $mensaje->delete();
        return redirect()->route('admin.mensajes.index')->with('eliminar','ok');
    }
}
