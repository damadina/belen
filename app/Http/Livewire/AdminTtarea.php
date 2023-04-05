<?php

namespace App\Http\Livewire;


use App\Models\ttarea;
use App\Models\ttrabajo;
use Illuminate\Auth\Events\Validated;
use Livewire\Component;

class AdminTtarea extends Component
{
    public $trabajo;
    public $tarea;
    public $name;
    public $descripcion;
    public $tipo;
    protected $listeners = ['delete'];

    protected $rules = [
        'tarea.name' => 'required',
        'tarea.descripcion' =>'required'
    ];

    public function mount(ttrabajo $trabajo,$tipo=null) {

        $this->trabajo = $trabajo;
        $this->tarea = new ttarea();
        $this->tipo = $tipo;

    }
    public function render()
    {
        return view('livewire.admin-ttarea');
    }
    public function edit(ttarea $tarea) {
        $this->resetValidation();
        $this->tarea = $tarea;
    }
    public function update() {
        $this->validate();
        $this->tarea->save();
        $this->tarea = new ttarea();
        $this->trabajo = ttrabajo::find($this->trabajo->id);

    }
    public function cancel() {
        $this->tarea = new ttarea();

    }
    public function resetCancel() {
        $this->reset(['name', 'descripcion']);
         $this->resetValidation();
    }

    public function store() {
        $this->validate([
            'name' => 'required',
            'descripcion' => 'required'
        ]);
        ttarea::create([
            'name' => $this->name,
            'descripcion' => $this->descripcion,
            'ttrabajo_id' => $this->trabajo->id
        ]);
        $this->reset(['name','descripcion']);
        $this->trabajo = ttrabajo::find($this->trabajo->id);
    }
    public function delete(ttarea  $tarea) {
        $tarea->delete();
        $this->trabajo = ttrabajo::find($this->trabajo->id);
        $this->emitTo('admin-ttrabajo','render');

    }
}
