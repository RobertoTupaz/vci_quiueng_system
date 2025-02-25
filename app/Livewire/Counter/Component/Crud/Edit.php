<?php

namespace App\Livewire\Counter\Component\Crud;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $id, $number, $email, $password, $password2;
    public $roles = [];
    public $allRoles = [];
    public $checkedRoles = [];

    #[On('added-role')]
    public function getRoles()
    {
        $this->allRoles = Role::all();
    }

    public function mount($counter)
    {
        $this->getRoles();
        $this->innitialize($counter);
    }

    public function innitialize($counter)
    {
        $this->checkedRoles = $counter->roles->pluck('id')->toArray();

        $this->id = $counter->id;
        $this->number = $counter->number;
        $this->email = $counter->email;
        $this->password = $counter->password;
        $this->password2 = $counter->password2;
        $this->roles = $counter->roles->pluck('name')->join(', ');
    }

    public function update()
    {
        $query = User::where('id', $this->id)->update([
            'name' => 'Couter ' . $this->number,
            'email' => $this->email,
            'number' => $this->number,
            'password' => Hash::make($this->password2),
            'password2' => $this->password2,
        ]);

        if ($query) {
            UserRoles::where('user_id', $this->id)->delete();
            foreach ($this->checkedRoles as $key => $value) {
                $query2 = UserRoles::create([
                    'user_id' => $this->id,
                    'role_id' => $value,
                ]);
            }

            // $this->resetExcept('roles');
        }
        if ($query) {
            $this->alert('success', 'Basic Alert');
            $this->cancelEdit();
            $this->dispatch('update-row', id: $this->id);
        }
    }

    public function notif()
    {
        // $this->alert('success', 'Basic Alert');
        //success, warning, error, info, question
    }

    public function cancelEdit()
    {
        $this->dispatch('cancel-edit', id: 1);
    }

    public function delete()
    {
        $this->counter->delete();
        $this->emit('counterUpdated'); // Notify parent to refresh
    }

    public function render()
    {
        return view('livewire.counter.component.crud.edit');
    }
}
