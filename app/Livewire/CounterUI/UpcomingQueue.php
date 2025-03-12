<?php

namespace App\Livewire\CounterUI;

use App\Models\Queue;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpcomingQueue extends Component
{
    public $queue;

    public function mount($data) {
        $this->queue = $data;
    }

    public function render()
    {
        return view('livewire.counter-u-i.upcoming-queue');
    }
}
