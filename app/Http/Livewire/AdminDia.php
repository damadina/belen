<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\tdia;
use App\Models\ttrabajo;
use App\Models\User;

class AdminDia extends Component
{
    public $dias;
    public $diaid = 1;
    public $users;
    public $openModal = true;

    public $trabajos;
    PUBLIC $trabajadorid = null;

    public $newdiaid;
    public $diaSelected;
    protected $listeners =['render'];

    public function mount() {
        /* $this->users = user::all(); */

        $this->users = User::role('trabajador')->get();
        $this->dias = tdia::all();
        $this->diaSelected = tdia::find(1);
        $this->trabajos = $this->diaSelected->trabajos;



    }
    public function render()
    {
        $this->diaSelected = tdia::find($this->diaid);
        $this->trabajos = $this->diaSelected->trabajos;


        return view('livewire.admin-dia');
    }

    public function updatedDiaid()
    {

        $this->reset('trabajos','diaSelected');
        $this->diaSelected = tdia::find($this->diaid);
        $this->trabajos = $this->diaSelected->trabajos;


    }
    /* public function updatedTrabajadorid($trabajadorid,  $key)
    {
        $trabajo = $this->trabajos[$key];

        $t = $trabajo->dias()->updateExistingPivot($trabajo->id, [
            'user_id' => $trabajadorid,
        ]);

        dd($t);



    }
 */
    public function clickSelect(ttrabajo $trabajo,$userId) {
        if($userId=="") {
            $userId =null;
        }
       $trabajo->dias()->updateExistingPivot($this->diaSelected->id, ['user_id' => $userId]);
        $dia = tdia::find($this->diaid);

       $this->trabajos = $dia->trabajos;


    }



    public function retirar(ttrabajo $trabajo) {


        $this->diaSelected->trabajos()->detach($trabajo->id);
        $this->diaSelected = tdia::find($this->diaid);
    }



}
