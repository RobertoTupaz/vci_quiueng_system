<?php

namespace App\Livewire\Counter\Component;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class CounterTable extends Component
{
    public $counters = null;

    public function mount()
    {
        $this->refreshCounters();
    }

    #[On('refresh-counters')]
    public function refreshCounters()
    {
        $this->counters = User::where('role', 'counter')->orderBy('number', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.counter.component.counter-table');
    }
}
