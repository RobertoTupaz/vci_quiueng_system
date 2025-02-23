<?php

namespace App\Livewire\Counter\Component;

use App\Models\User;
use Livewire\Component;

class CounterTable extends Component
{
    protected $listeners = ['counterUpdated' => 'refreshCounters'];

    public $counters = null;

    public function mount(){
        $this->refreshCounters();
    }

    public function refreshCounters() {
        $this->counters = User::where('role', 'counter')->orderBy('number', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.counter.component.counter-table');
    }
}
