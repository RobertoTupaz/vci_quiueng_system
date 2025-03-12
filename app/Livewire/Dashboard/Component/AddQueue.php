<?php

namespace App\Livewire\Dashboard\Component;

use App\Models\CurrentLetter;
use App\Models\Queue;
use App\Models\Role;
use App\Models\Transaction;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddQueue extends Component
{
    use LivewireAlert;

    public $roles;
    public $name = null;

    public $selectedRole;
    public $priorityLevel = 'normal';

    public function mount()
    {
        $this->getRoles();
    }

    public function addQueue()
    {
        if ($this->selectedRole == 'not set' || $this->selectedRole == null) {
            $this->alert('error', 'Please select a transaction method');
        } else {
            $addQueue = null;
            $latestLetter = Queue::where('role_id', $this->selectedRole)->latest()->first();
            $currentLetter = CurrentLetter::find(1);

            if ($latestLetter == null) {
                $newLetter = $this->getLetter($currentLetter->letter);
                $addQueue = Queue::create([
                    'role_id' => $this->selectedRole,
                    'priority_level' => $this->priorityLevel,
                    'ticket_number' => 1,
                    'ticket_letter' => $newLetter,
                    'name' => $this->name,
                ]);

                $currentLetter->letter = $newLetter;
                $currentLetter->save();
            } else {
                $addQueue = Queue::create([
                    'role_id' => $this->selectedRole,
                    'priority_level' => $this->priorityLevel,
                    'ticket_number' => $latestLetter->ticket_number + 1,
                    'ticket_letter' => $latestLetter->ticket_letter,
                    'name' => $this->name,
                ]);
            }

            $this->selectedRole = 'not set';
            $this->name = null;
            $this->priorityLevel = 'normal';
            $this->alert(
                'success',
                'Ticket : ' . $addQueue->ticket_letter .addZeroes(strlen($addQueue->ticket_number)). $addQueue->ticket_number,
                [
                    'toast' => false,
                    'position' => 'center'
                ]
            );
        }
    }

    public function getLetter($letter)
    {
        switch ($letter) {
            case '-':
                return 'A';
            case 'A':
                return 'B';
            case 'B':
                return 'C';
            case 'C':
                return 'D';
            case 'D':
                return 'E';
            case 'E':
                return 'F';
            case 'F':
                return 'G';
            case 'G':
                return 'H';
            case 'H':
                return 'I';
            case 'I':
                return 'J';
            case 'J':
                return 'K';
            case 'K':
                return 'L';
            case 'L':
                return 'M';
            case 'M':
                return 'N';
            case 'N':
                return 'O';
            case 'O':
                return 'P';
            case 'P':
                return 'Q';
            case 'Q':
                return 'R';
            case 'R':
                return 'S';
            case 'S':
                return 'T';
            case 'T':
                return 'U';
            case 'U':
                return 'V';
            case 'V':
                return 'W';
            case 'W':
                return 'X';
            case 'X':
                return 'Y';
            case 'Y':
                return 'Z';
            default:
                return 'A';
        }
    }

    //Transaction = Counter Roles
    public function getRoles()
    {
        $this->roles = Role::all();
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
