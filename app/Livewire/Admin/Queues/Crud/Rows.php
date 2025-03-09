<?php

namespace App\Livewire\Admin\Queues\Crud;

use App\Models\Queue;
use Livewire\Component;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Rows extends Component
{
    use LivewireAlert;
    public $queue = [];
    public $priority_level;

    public function mount($data) {
        $this->queue = $data;
        $this->priority_level = $data->priority_level;
    }

    public function changePriorityLevel() {
        $this->queue['priority_level'] = $this->priority_level;
        $updateQueue = Queue::where('id', $this->queue['id'])
        ->update([
            'priority_level' => $this->priority_level
        ]);

        if($updateQueue) {
            $this->alert('success', 'Priority Level Updated Successfully!');
        }
    }

    public function render()
    {
        return view('livewire.admin.queues.crud.rows');
    }
}
