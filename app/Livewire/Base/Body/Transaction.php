<?php

namespace App\Livewire\Base\Body;

use App\Models\Queue;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Transaction extends Component
{
    public $role;
    public $queue;

    public function mount($role) {
        $this->role = $role;
        $this->setQueue();
    }

    public function setQueue() {
        $this->queue = Queue::where("role_id", $this->role->id)
        ->where('status', 'ongoing')
        ->first();
    }

    #[On('update-ongoing')]
    public function getOngoingQueues($id)
    {
        if($this->queue?->counter?->number == $id) {
            $this->setQueue();
        }
    }

    public function render()
    {
        return view('livewire.base.body.transaction');
    }
}
