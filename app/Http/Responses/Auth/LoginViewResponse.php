<?php

namespace App\Http\Responses\Auth;

use Laravel\Fortify\Contracts\LoginViewResponse as LoginViewResponseContract;

class LoginViewResponse implements LoginViewResponseContract
{
    public function toResponse($request)
    {
        return view('auth.login');
    }
}
