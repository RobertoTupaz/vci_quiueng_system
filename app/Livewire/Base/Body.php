<?php

namespace App\Livewire\Base;

use App\Models\Queue;
use App\Models\Role;
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
    public $roles;

    public function mount()
    {
        $this->setRoles();
        $this->getNewQueues();
        // $this->getOngoingQueues();
        $this->audio = asset('audio/speech.mp3');
    }


    #[On('roles-updated')]
    public function setRoles() {
        $this->roles = Role::all();
    }

    #[On('queues-updated')]
    public function queuesUpdated($data)
    {
        $this->audio = $data[0];
        $this->getNewQueues();
        $this->dispatch('update-ongoing', $data[1]);
    }

    public function getNewQueues()
    {
        $this->queues = Queue::where('status', 'new')
            ->orderBy('priority_level', 'desc')
            ->limit(9)
            ->get();

        // $this->getOngoingQueues();
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

    public function render()
    {
        return view('livewire.base.body');
    }
}
