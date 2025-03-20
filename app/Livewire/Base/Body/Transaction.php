<?php

namespace App\Livewire\Base\Body;

use App\Models\Queue;
use Livewire\Attributes\On;
use Livewire\Component;

class Transaction extends Component
{
    public $role;
    public $queue;
    public $isBlinking = false;

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
    public function getOngoingQueues($data)
    {
        if($this->role?->id == $data[0]['id']) {
            $this->setQueue();
            $this->dispatch('blink-ready', $data[0]['id']);
            // $this->blinkBackGround();
        }
    }

    public function blinkBackGround() {
        $this->isBlinking = !$this->isBlinking;
        sleep(0.5);
    }

    public function blink1() {

    }

    public function render()
    {
        return view('livewire.base.body.transaction');
    }
}
