<?php

namespace App\Livewire\Admin\Queues;

use App\Models\Queue;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Body extends Component
{
    use LivewireAlert;
    public $queues = [];

    use WithFileUploads;
    public $video;

    public function saveVideo() {

        $uploadedVideo = $this->video->store('videos', 'public');

        if($uploadedVideo) {
            $this->alert('success', 'Video Uploaded Successfully!');
        }
    }

    public function mount()
    {
        $this->queues = Queue::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.admin.queues.body');
    }
}
