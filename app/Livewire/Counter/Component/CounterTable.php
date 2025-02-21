<?php

namespace App\Livewire\Counter\Component;

use App\Models\User;
use Livewire\Component;

class CounterTable extends Component
{
    public $counters = null;

    public function mount(){
        $this->counters = User::where('role', 'counter')->get();
    }
    public function render()
    {
        return view('livewire.counter.component.counter-table');
    }
}
