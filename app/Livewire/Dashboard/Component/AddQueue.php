<?php

namespace App\Livewire\Dashboard\Component;

use App\Models\Transaction;
use Livewire\Component;

class AddQueue extends Component
{
    public function testNotify() {
        $this->redirect('/notify'); 
    }
    public function render()
    {
        return view('livewire.dashboard.component.add-queue') 
        -> with('transactions', Transaction::all());
    }
}
