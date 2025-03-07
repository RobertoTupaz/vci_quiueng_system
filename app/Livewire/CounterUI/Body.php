<?php

namespace App\Livewire\CounterUI;

use App\Models\Queue;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Body extends Component
{
    public $queue;

    public function serveQueue()
    {
        $counterRoles = Auth::user()->roles()->pluck('roles.id')->toArray();
        $queue = Queue::where('status', 'new')
            ->where(function ($query) use ($counterRoles) {
                foreach ($counterRoles as $role_id) {
                    $query->orWhere('role_id', $role_id);
                }
            })
            ->first();

        $this->queues = $queue;

    }
    public function mount()
    {
        $this->serveQueue();
    }
    public function render()
    {
        return view('livewire.counter-u-i.body');
    }
}
