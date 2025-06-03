<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Http\Responses\RegisterResponse as CustomRegisterResponse;


// 🔽 Aggiungi questi "use" per i binding personalizzati
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Contracts\LoginResponse;

use App\Http\Responses\Auth\LoginViewResponse as CustomLoginViewResponse;
use App\Http\Responses\Auth\RegisterViewResponse as CustomRegisterViewResponse;
use App\Http\Responses\LoginResponse as CustomLoginResponse;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // 🔧 Collega le risposte personalizzate
        $this->app->singleton(LoginViewResponse::class, CustomLoginViewResponse::class);
        $this->app->singleton(RegisterViewResponse::class, CustomRegisterViewResponse::class);
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
        $this->app->singleton(RegisterResponse::class, CustomRegisterResponse::class);

    }

    public function boot(): void
    {
        // Associa le azioni Fortify
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // ✅ Collega le view personalizzate
        Fortify::loginView(fn () => view('auth.login'));
        Fortify::registerView(fn () => view('auth.register'));
    }
}
