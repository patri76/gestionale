<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Illuminate\Support\Facades\Auth;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        Auth::logout(); // logout automatico dopo registrazione
        return redirect('/')->with('success', 'Registrazione completata. Ora puoi accedere.');
    }
}
