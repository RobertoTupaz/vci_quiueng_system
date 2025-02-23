<?php

namespace App\Livewire\Counter\Component\Crud;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Row extends Component
{
    public $id, $number, $email, $password, $password2;
    public $roles = [];

    public $isEditing = false;

    public $allRoles = [];
    public $newRole = null;
    public $checkedRoles = [];

    public function mount($counter) {
        $this->getRoles();

        $this->id = $counter->id;
        $this->number = $counter->number;
        $this->email = $counter->email;
        $this->password = $counter->password;
        $this->password2 = $counter->password2;
        $this->roles = $counter->roles->pluck('name')->join(', ');
        $this->checkedRoles = $counter->roles->pluck('id')->toArray();
    }

    public function getRoles() {
        $this->allRoles = Role::all();
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancelEdit()
    {
        $this->isEditing = false;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'number' => 'nullable|integer',
        ]);

        $this->counter->update([
            'name' => $this->name,
            'email' => $this->email,
            'number' => $this->number,
        ]);

        $this->isEditing = false;
        $this->emit('counterUpdated'); // Notify parent
    }

    public function delete()
    {
        $this->counter->delete();
        $this->emit('counterUpdated'); // Notify parent to refresh
    }

    public function render()
    {
        return view('livewire.counter.component.crud.row');
    }
}
