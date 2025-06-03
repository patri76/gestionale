<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->role === 'direzione') {
            return redirect()->intended('/dashboard-direzione');
        } elseif ($user->role === 'insegnante') {
            return redirect()->intended('/dashboard-insegnante');
        } else {
            return redirect()->intended('/dashboard-studente');
        }
    }
}
