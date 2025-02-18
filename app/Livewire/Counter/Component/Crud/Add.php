<?php

namespace App\Livewire\Counter\Component\Crud;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRoles;
use Livewire\Component;

use function Laravel\Prompts\alert;

class Add extends Component
{
    public $counterNumber;
    public $username;
    public $password;

    public $roles;
    public $newRole = null;
    public $checkedRoles = [];

    public function saveCounter() {
        $query = User::create([
            'name' => 'Counter '.$this->counterNumber,
            'email' => $this->username,
            'password' => $this->password,
            'role' => 'counter',
            'number' => $this->counterNumber,
        ]);

        if($query) {
            foreach ($this->checkedRoles as $key => $value) {
                $query2 = UserRoles::create([
                    'user_id' => $query->id,
                    'role_id' => $value,
                ]);
            }

            $this->resetExcept('roles');
        }
    }

    public function saveRole() {
        $query = Role::create([
            'name' => $this->newRole,
        ]);

        if($query) {
            $this->reset('newRole');
            $this->getRoles();
        }
    }

    public function getCheckedItems()
    {
        dd($this->checkedRoles); // Debug: Display checked items
    }

    public function getRoles() {
        $this->roles = Role::all();
    }

    public function mount() {
        $this->getRoles();
    }

    public function render()
    {
        return view('livewire.counter.component.crud.add');
    }
}
