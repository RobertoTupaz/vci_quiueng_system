<?php

namespace App\Livewire\Admin\Queues;

use App\Models\Queue;
use Livewire\Component;

class Body extends Component
{
    public $queues = [];

    public function mount()
    {
        $this->queues = Queue::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.admin.queues.body');
    }
}
