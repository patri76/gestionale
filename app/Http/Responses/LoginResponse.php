<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $role = Auth::user()->role;

        return match ($role) {
            'direzione' => redirect('/dashboard-direzione'),
            'insegnante' => redirect('/dashboard-insegnante'),
            'studente'   => redirect('/dashboard-studente'),
            default      => redirect('/'),
        };
    }
}
