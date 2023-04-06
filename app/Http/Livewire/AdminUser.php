<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class AdminUser extends Component

{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    protected $listeners = ['delete'];
    public $search ="";

    public function render()
    {
        $users = User::where('name','!=','Admin' )
            ->where(function ($query) {
                $query->where('name','LIKE', '%'.$this->search.'%')
                ->orwhere('email','LIKE', '%'.$this->search.'%');
            }) ->paginate(50);

        /* $users = User::where('name','LIKE', '%'.$this->search.'%')
            ->orwhere('email','LIKE', '%'.$this->search.'%')

            ->paginate(8); */
        return view('livewire.admin-user',compact('users'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete(User $user) {
       $user->delete();


    }

}

