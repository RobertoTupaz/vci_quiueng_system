<?php

namespace App\Livewire\Dashboard\Component;

use App\Models\Queue;
use App\Models\Role;
use App\Models\Transaction;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddQueue extends Component
{
    use LivewireAlert;

    public $transaction;
    public $priorityLevel = 'normal';

    public function mount()
    {
        $this->getTransaction();
    }

    public function addQueue()
    {
        $addQueue = Queue::create([
            'transaction_id' => ''
        ]);
    }

    //Transaction = Counter Roles
    public function getTransaction()
    {
        $this->transaction = Role::all();
    }
    public function testNotify()
    {
        $this->redirect('/notify');
    }
    public function render()
    {
        return view('livewire.dashboard.component.add-queue');
    }
}
