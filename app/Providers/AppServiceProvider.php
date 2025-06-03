<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Responses\LoginResponse;
use App\Http\Responses\Auth\LoginViewResponse as CustomLoginViewResponse;
use App\Http\Responses\Auth\RegisterViewResponse as CustomRegisterViewResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 🔐 Binding per creare nuovi utenti
        $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);

        // ✅ Binding per la view del login
        $this->app->singleton(LoginViewResponse::class, CustomLoginViewResponse::class);

        // ✅ Binding per la view della registrazione
        $this->app->singleton(RegisterViewResponse::class, CustomRegisterViewResponse::class);

        // ✅ Binding per il redirect personalizzato dopo login
        $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
