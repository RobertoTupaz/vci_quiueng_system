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
                    'status' => false,
                ]);

                $currentLetter->letter = $newLetter;
                $currentLetter->save();
            } else {
                $addQueue = Queue::create([
                    'role_id' => $this->selectedRole,
                    'priority_level' => $this->priorityLevel,
                    'ticket_number' => $latestLetter->ticket_number + 1,
                    'ticket_letter' => $latestLetter->ticket_letter,
                    'status' => false,
                ]);
            }

            $this->selectedRole = 'not set';
            $this->alert(
                'success',
                'Ticket : ' . $addQueue->ticket_letter . $addQueue->ticket_number,
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
                break;
            case 'A':
                return 'B';
                break;
            case 'B':
                return 'C';
                break;
            case 'C':
                return 'D';
                break;
            case 'D':
                return 'E';
                break;
            case 'E':
                return 'F';
                break;
            case 'F':
                return 'G';
                break;
            case 'G':
                return 'H';
                break;
            case 'H':
                return 'I';
                break;
            case 'I':
                return 'J';
                break;
            case 'J':
                return 'K';
                break;
            case 'K':
                return 'L';
                break;
            case 'L':
                return 'M';
                break;
            case 'M':
                return 'N';
                break;
            case 'N':
                return 'O';
                break;
            case 'O':
                return 'P';
                break;
            case 'P':
                return 'Q';
                break;
            case 'Q':
                return 'R';
                break;
            case 'R':
                return 'S';
                break;
            case 'S':
                return 'T';
                break;
            case 'T':
                return 'U';
                break;
            case 'U':
                return 'V';
                break;
            case 'V':
                return 'W';
                break;
            case 'W':
                return 'X';
                break;
            case 'X':
                return 'Y';
                break;
            case 'Y':
                return 'Z';
                break;
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
