<?php

namespace App\Livewire\CounterUI;

use App\Models\Queue;
use App\TextToSpeech\VoiceRSS;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Events\WebsoketDirect;
use Carbon\Carbon;
use Livewire\Attributes\On;

class Body extends Component
{
    public $queue;
    public $doneQueue;
    public $audio;
    public $counterQueuesWithSameRole;

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

        if ($queue) {
            $this->queue = $queue;

            $queue->user_id = auth()->user()->id;
            $queue->status = 'ongoing';
            $queue->save();

            $this->getQueuesWithSameRole();
        }
    }

    public function getQueuesWithSameRole()
    {
        $counterRoles = Auth::user()->roles()->pluck('roles.id')->toArray();
        $this->counterQueuesWithSameRole = Queue::where('status', 'new')
            ->where(function ($query) use ($counterRoles) {
                foreach ($counterRoles as $role_id) {
                    $query->orWhere('role_id', $role_id);
                }
            })
            ->orderBy('priority_level', 'desc')
            ->orderBy('created_at', 'asc')
            ->get();

    }

    public function getOngoingQueue()
    {
        $ongoingQueue = Queue::where('status', 'ongoing')->where('user_id', Auth::user()->id)->first();
        if ($ongoingQueue == null) {
            $this->queue = null;
        } else {
            $this->queue = $ongoingQueue;
        }
    }
    public function mount()
    {
        $this->getOngoingQueue();
        $this->audio = asset('audio/speech.mp3');
        $this->getQueuesWithSameRole();
    }

    public function next()
    {

        if ($this->queue) {
            $this->queue->status = 'done';
            $this->queue->save();
        }

        $this->getOngoingQueue();
        $this->serveQueue();

        $this->audio = $this->setAudio($this->getTicket());
        if ($this->audio) {
            $this->dispatch('play-audio', ['data' => '$this->audio']);
            new WebsoketDirect($this->audio);
        } else {
            new WebsoketDirect();
        }
    }

    public function notifyBase()
    {
        $this->audio = $this->setAudio($this->getTicket());
        if ($this->audio) {
            $this->dispatch('play-audio', ['data' => '$this->audio']);
            new WebsoketDirect($this->audio);
        } else {
            new WebsoketDirect();
        }
    }

    public function getTicket()
    {
        if ($this->queue) {
            $letter = $this->queue->ticket_letter;
            $zeros = addZeroes(strlen($this->queue->ticket_number));
            $number = $this->queue->ticket_number;
            $ticket = $letter . $zeros . $number;
            return 'Now Serving ' . $ticket . ', Please Proceed to counter ' . auth()->user()->number;
        }
    }

    public function setAudio($text)
    {

        $apiKey = "9dd92be563d74e838153b1f9837360c2";
        $url = "https://api.voicerss.org/?key=$apiKey&hl=en-us&src=" . urlencode($text);

        $audio = file_get_contents($url);

        if (!$audio) {
            die("Error fetching audio from VoiceRSS.");
        }

        file_put_contents(public_path('audio\speech.mp3'), $audio);

        $timestamp = Carbon::now()->timestamp;
        return asset('audio/speech.mp3?t=' . $timestamp);
    }

    public function previous()
    {
        if ($this->queue) {
            $this->queue->status = 'new';
            $this->queue->save();
        }

        $this->reset('queue');

        $this->getDone();
        $this->getOngoingQueue();

        $this->audio = $this->setAudio($this->getTicket());
        if ($this->audio) {
            $this->dispatch('play-audio', ['data' => '$this->audio']);
            new WebsoketDirect($this->audio);
        } else {
            new WebsoketDirect();
        }
    }

    public function getDone()
    {
        $doneQueue = Queue::where('status', 'done')
            ->where('user_id', Auth::user()->id)
            ->orderBy('updated_at', 'desc')
            ->first();

        if ($doneQueue) {
            $doneQueue->status = 'ongoing';
            $doneQueue->save();

            $this->queue = $doneQueue;
        }
    }

    public function notify()
    {

    }
    public function render()
    {
        return view('livewire.counter-u-i.body');
    }
}
