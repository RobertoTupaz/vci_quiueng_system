<?php

namespace App\Livewire\Counter\Component\Crud;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On; 

class Edit extends Component
{   
    public $showModal = false;

    public $counterID, $counterNumber, $email, $password;

    public $roles;
    public $newRole = null;
    public $checkedRoles = [];

    #[On('open-edit-modal')]
    public function openEditModal($counterID) {
        $counter = User::find($counterID);
        
        $this->counterID = $counterID;
        $this->counterNumber = $counter->number;
        $this->email = $counter->number;
        $this->password = $counter->number;
        $this->checkedRoles = $counter->roles->pluck('id')->toArray();
        $this->getRoles();

        // dd($this->counterRoles);
        $this->showModal = true;
    }

    public function getRoles() {
        $this->roles = Role::all();
    }

    public function mount() {
        // $counter = User::find($id);
        
        // $this->counterNumber = $counter->number;
        // $this->email = $counter->number;
        // $this->password = $counter->number;
        // $this->getRoles();
    }

    public function render()
    {
        return view('livewire.counter.component.crud.edit');
    }
}
