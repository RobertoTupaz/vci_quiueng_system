<?php

namespace App\Livewire\Base;

use App\Models\Queue;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Body extends Component
{
    public $queues = [];
    public $activeCounter = [];
    public $ongoingQeues = [];

    public function mount() {
        $this->getNewQueues();
        $this->getActiveCounter();
        $this->getOngoingQueues();
    }

    #[On('active-updated')]
    public function getOngoingQueues(){
        $this->ongoingQeues = Queue::where('status', 'ongoing')->get();
    }

    #[On('queues-updated')]
    public function getNewQueues() {
        $this->queues = Queue::where('status', 'new')
        ->orderBy('priority_level', 'desc')
        ->limit(12)
        ->get();
    }

    public function getActiveCounter() {
        $activeCounter = User::where('role', 'counter')
        ->where('status', true)
        ->get();

        $this->activeCounter = $activeCounter;
    }

    public function render()
    {
        return view('livewire.base.body');
    }
}
