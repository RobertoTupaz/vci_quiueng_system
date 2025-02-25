<?php

namespace App\Livewire\Counter\Component\Crud;

use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Row extends Component
{
    use LivewireAlert;
    public $counter;
    public $id, $number, $email, $password, $password2;
    public $roles = [];

    public $isEditing = false;
    public $showDelete = false;

    public function mount($counter)
    {
        $this->innitialize($counter);
    }

    #[On('update-row')]
    public function updateRow($id)
    {
        if ($this->id == $id) {
            $counter = User::find($id);
            $this->counter = $counter;
            $this->id = $counter->id;
            $this->number = $counter->number;
            $this->email = $counter->email;
            $this->password = $counter->password;
            $this->password2 = $counter->password2;
            $this->roles = $counter->roles->pluck('name')->join(', ');
        }
    }
    public function innitialize($counter)
    {
        $this->counter = $counter;
        $this->id = $counter->id;
        $this->number = $counter->number;
        $this->email = $counter->email;
        $this->password = $counter->password;
        $this->password2 = $counter->password2;
        $this->roles = $counter->roles->pluck('name')->join(', ');
    }

    public function edit()
    {
        $this->dispatch('cancel-edit', id: $this->id);
        $this->isEditing = true;
    }

    #[On('cancel-edit')]
    public function cancelEdit($id)
    {
        if ($this->id != $id) {
            $this->isEditing = false;
        }
    }

    public function isDeleting()
    {
        if ($this->showDelete) {
            $this->showDelete = false;
        } else {
            $this->showDelete = true;
        }
    }

    public function deleteCounter()
    {
        $query = User::where('id', $this->id)->delete();
        if ($query) {
            $this->alert('success', 'Counter Deleted Sucessfully!');
            $this->dispatch('refresh-counters');
        }
    }

    public function render()
    {
        return view('livewire.counter.component.crud.row');
    }
}
