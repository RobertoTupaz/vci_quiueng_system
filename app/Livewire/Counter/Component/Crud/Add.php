<?php

namespace App\Livewire\Counter\Component\Crud;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRoles;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    use LivewireAlert;
    public $counterNumber, $username, $password;

    public $roles;
    public $newRole = null;
    public $checkedRoles = [];

    public function saveCounter()
    {
        $query = User::create([
            'name' => 'Counter ' . $this->counterNumber,
            'email' => $this->username,
            'password' => $this->password,
            'password2' => $this->password,
            'role' => 'counter',
            'number' => (int) $this->counterNumber,
        ]);

        if ($query) {
            foreach ($this->checkedRoles as $key => $value) {
                $query2 = UserRoles::create([
                    'user_id' => $query->id,
                    'role_id' => $value,
                ]);
            }

            $this->resetExcept('roles');
            $this->dispatch('refresh-counters');
            $this->alert('success', 'Counter Added Sucessfully');
        }
    }

    public function saveRole()
    {
        $query = Role::create([
            'name' => $this->newRole,
        ]);

        if ($query) {
            $this->reset('newRole');
            $this->getRoles();
            $this->dispatch('added-role');
        }
    }

    public function getRoles()
    {
        $this->roles = Role::all();
    }

    public function deleteRoles() {
        foreach ($this->checkedRoles as $key) {
            $deletedRoles = Role::where('id', $key)->delete();
        }

        if($deletedRoles) {
            $this->getRoles();
            $this->alert('success', 'Role Deleted Sucessfully!');
        }
    }

    public function mount()
    {
        $this->getRoles();
    }

    public function render()
    {
        return view('livewire.counter.component.crud.add');
    }
}
