<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;


class TrabajadoresList extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    protected $listeners = ['delete','render'];
    public $search ="";
    public $open_edit = false;
    public $name,$email,$password,$password_confirmation;
    public $listaRoles;
    public $roles= [];
    public $user;

    protected function rules ()
    {
        return [
            'name' => [
                'required',
                'min:6',
                'max:50',
                Rule::unique('users')->ignore($this->user->id, 'id'),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->email, 'email'),
            ],
            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed',
            ]
        ];
    }



     protected $messages = [
        'name.unique' => 'Ya existe un trabajador con este nombre',
        'email.unique' => 'Ya existe un trabajador con este correo electrónico',
    ];




    public function mount() {
        $this->listaRoles = Role::all();
        $this->user = new User();
    }


    public function render()
    {
        $users = User::where('name','!=','Admin' )
            ->where(function ($query) {
                $query->where('name','LIKE', '%'.$this->search.'%')
                ->orwhere('email','LIKE', '%'.$this->search.'%');
            }) ->paginate(50);

        return view('livewire.trabajadores-list',compact('users'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete(User $user) {

       $user->delete();
       $this->open_edit = false;
    }
    public function  edit(user $user ) {

        $this->user= $user;
        $this->roles = $user->roles->pluck('id');

        $this->name = $user->name;
        $this->email = $user->email;
        $this->open_edit = true;
    }

    public function update() {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        if($this->password != null) {
            $this->user->password = bcrypt($this->password);
        }
        $this->user->save();

        $this->user->roles()->sync($this->roles);
        $this->reset(['password']);

        $this->open_edit = false;

    }




}
