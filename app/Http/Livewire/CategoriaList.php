<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categoria;
use Illuminate\Validation\Rule;

class CategoriaList extends Component
{
    public $categorias;
    public $categoria;
    public $open_edit = false;
    public $name;

    protected $listeners  = ['render','delete'];


    public function mount() {
        $this->categoria = new categoria();
    }


    /* public function rules()
    {
        return [
            'categoria.name' => ['required','min:6','max:50', Rule::unique('categorias')->ignore("$this->categoria->id")],
        ];
    } */

    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:6',
                'max:50',
                Rule::unique('categorias')->ignore($this->categoria->id, 'id')
            ],

        ];
    }

    protected $messages = [
        'name.unique' => "Ya existe una categoría con este nombre"
    ];




    public function render()
    {
        $this->categorias = categoria::all();
        return view('livewire.categoria-list');
    }

    public function  edit(categoria $categoria ) {
        $this->name = $categoria->name;
        $this->categoria = $categoria;
        $this->open_edit = true;
    }

    public function update() {
        $this->validate();
        $this->categoria->name = $this->name;
        $this->categoria->save();
        $this->open_edit = false;

    }
    public function delete(categoria $categoria) {
        $categoria->delete();
    }
}
