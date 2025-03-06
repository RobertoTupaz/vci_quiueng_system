<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        Log::info(auth()->check() || auth()->user()->isCounter());
        
        if (auth()->check() || auth()->user()->isCounter()) {
            return redirect('/counter/dashboard'); // Redirect to some other page if not admin
        }

        return $request->expectsJson() ? null : route('login');
    }
}
