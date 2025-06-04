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
        return redirect()->intended(route('dashboard.direzione'));
    } elseif ($user->role === 'insegnante') {
        return redirect()->intended(route('dashboard.insegnante'));
    } else {
        return redirect()->intended(route('dashboard.studente'));
    }
}
}
