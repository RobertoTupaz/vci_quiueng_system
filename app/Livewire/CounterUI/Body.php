<?php

namespace App\Livewire\CounterUI;

use App\Events\BroadcastEvent as EventsBroadcastEvent;
use App\Models\Queue;
use App\Models\User;
use BroadcastEvent;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Pusher\Pusher;
use App\Events\WebsoketDirect;

class Body extends Component
{
    public $queue;
    public $doneQueue;

    public function serveQueue()
    {
        $counterRoles = Auth::user()->roles()->pluck('roles.id')->toArray();
        $queue = Queue::where('status', 'new')
            ->where(function ($query) use ($counterRoles) {
                foreach ($counterRoles as $role_id) {
                    $query->orWhere('role_id', $role_id);
                }
            })
            ->orderBy('priority_level', 'desc')
            ->orderBy('created_at', 'asc')
            ->first();

        if($queue) {
            $this->queue = $queue;
        
            $queue->user_id = auth()->user()->id;
            $queue->status = 'ongoing';
            $queue->save(); 
        }
    }

    public function getOngoingQueue() {
        $ongoingQueue = Queue::where('status', 'ongoing')->where('user_id', Auth::user()->id)->first();
        if($ongoingQueue == null) {
            $this->queue = null;
        } else {
            $this->queue = $ongoingQueue;
        }
    }
    public function mount()
    {
        $this->getOngoingQueue();
    }

    public function next() {

        if($this->queue) {
            $this->queue->status = 'done';
            $this->queue->save();
        }

        $this->getOngoingQueue();
        $this->serveQueue();

        new WebsoketDirect();
        new WebsoketDirect('auth');
    }

    public function previous() {
        if($this->queue) {
            $this->queue->status = 'new';
            $this->queue->save();
        }

        $this->reset('queue');
    
        $this->getDone();
        $this->getOngoingQueue();

        new WebsoketDirect();
        new WebsoketDirect('auth');
    }

    public function getDone() {
        $doneQueue = Queue::where('status', 'done')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        if($doneQueue) {
            $doneQueue->status = 'ongoing';
            $doneQueue->save();
            
            $this->queue = $doneQueue;
        }
    }

    public function notify() {

    }
    public function render()
    {
        return view('livewire.counter-u-i.body');
    }
}
