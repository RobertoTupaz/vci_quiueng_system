<?php

namespace App\Livewire\Counter\Component\Crud;

use App\Models\Role;
use Livewire\Component;

class Edit extends Component
{
    public $counterNumber;
    public $username;
    public $password;

    public $roles;
    public $newRole = null;
    public $checkedRoles = [];

    public function getRoles() {
        $this->roles = Role::all();
    }

    public function mount($counter) {
        $this->getRoles();
    }
    public function render()
    {
        return view('livewire.counter.component.crud.edit');
    }
}
