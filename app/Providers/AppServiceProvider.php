<?php

namespace App\Providers;

use App\Filament\Resources\TemplateResource;
use Illuminate\Support\ServiceProvider;
use DutchCodingCompany\FilamentSocialite\Facades\FilamentSocialite;
use DutchCodingCompany\FilamentSocialite\Models\Contracts\FilamentSocialiteUser as FilamentSocialiteUserContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentSocialite::setLoginRedirectCallback(function (string $provider, FilamentSocialiteUserContract $socialiteUser) {
            return redirect()->intended(
                TemplateResource::getUrl('index')
            );
        });
    }
}
