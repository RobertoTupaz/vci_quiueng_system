<?php

namespace App\Livewire\Actions;

use App\Events\WebsoketDirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke(): void
    {
        if(Auth::user()->role = 'counter') {
            $authenticatedUser = User::find(Auth::user()->id);
            $authenticatedUser->status = false;
            $authenticatedUser->save();
        }

        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
    }
}
