<?php

namespace App\Http\Livewire;

use App\Models\categoria;
use Livewire\Component;
use App\Models\ttrabajo;
use App\Models\ttarea;
use Livewire\WithPagination;

class AdminTtrabajo extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search ="";
    public $categoriaid =1;

    public $categorias;
    public $trabajo;
    public $tarea;
    public $name;
    public $descripcion;
    public $tiempoestimado = 3600;
    public $newCategoria_id=1;


    public $horas = [];
    protected $rules = [
        'trabajo.name' => 'required',
        'trabajo.descripcion' => 'required',
        'trabajo.categoria_id' => 'required'

    ];
    protected $listeners = ['delete','render'];

    public function mount()
    {
        $categorias = categoria::all();
        $this->categorias = $categorias;
        $this->trabajo = new ttrabajo();


        for ($i = 1; $i <= 12; $i++) {
            array_push($this->horas,$i.' Horas');
        }
    }


    public function render()
    {

        $plantillas = TTrabajo::where('categoria_id',$this->categoriaid)
            ->paginate(8);


        return view('livewire.admin-ttrabajo',compact('plantillas'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function edit(ttrabajo $trabajo) {
        $this->trabajo = $trabajo;
    }
    public function update() {
        $this->validate();
        $this->trabajo->save();
        $this->trabajo = new ttrabajo();

    }
    public function cancel() {
        $this->trabajo = new ttrabajo();
    }
    public function resetCancel() {
        $this->reset(['name', 'descripcion']);
         $this->resetValidation();
    }
    public function store() {


        $this->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'tiempoestimado' => 'required',
            'newCategoria_id' => 'required|gt:0'
        ]);


        ttrabajo::create([
            'name' => $this->name,
            'descripcion' => $this->descripcion,
            'tiempoestimado' => $this->tiempoestimado,
            'categoria_id' => $this->newCategoria_id
        ]);

        $this->reset(['name','descripcion','tiempoestimado','newCategoria_id' ]);
        $this->trabajo = new ttrabajo();
    }

    public function delete(ttrabajo $trabajo) {

        $trabajo->delete();
    }
    public function updatedCategoriaid($t)
    {
        $this->newCategoria_id = $this->categoriaid;
    }
}

