<?php

namespace App\Livewire\Base;

use App\Models\Queue;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class Body extends Component
{
    public $queues = [];
    // public $activeCounter = [];
    public $ongoingQeues = [];

    public $audio;

    public function mount()
    {
        $this->getNewQueues();
        // $this->getActiveCounter();
        $this->getOngoingQueues();
        $this->audio = asset('audio/speech.mp3');
    }

    // #[On('active-updated')]
    public function getOngoingQueues()
    {
        $this->ongoingQeues = Queue::where('status', 'ongoing')->get();
    }

    #[On('queues-updated')]
    public function queuesUpdated($data)
    {
        $this->audio = $data;
        $this->getNewQueues();
    }
    public function getNewQueues()
    {
        $this->queues = Queue::where('status', 'new')
            ->orderBy('priority_level', 'desc')
            ->limit(12)
            ->get();

        $this->getOngoingQueues();
        $this->dispatch('play-audio', ['data' => '$this->audio']);
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

    public function getActiveCounter()
    {
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
