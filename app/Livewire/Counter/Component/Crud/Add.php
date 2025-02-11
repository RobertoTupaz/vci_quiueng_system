<?php

namespace App\Livewire\Counter\Component\Crud;

use Livewire\Component;

class Add extends Component
{
    public $counterNumber;
    public $username;
    public $password;
    public $roles = [];

    public function render()
    {
        return view('livewire.counter.component.crud.add');
    }
}
