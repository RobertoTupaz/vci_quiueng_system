<?php

namespace App\Livewire\Base;

use App\Models\Queue;
use Livewire\Component;

class Body extends Component
{
    public $queues;

    public function mount() {
        $this->queues = Queue::limit(12)->get();
    }

    public function render()
    {
        return view('livewire.base.body');
    }
}
