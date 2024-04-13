<?php

namespace App\Providers;

use App\Filament\Resources\TemplateResource;
use DutchCodingCompany\FilamentSocialite\Facades\FilamentSocialite;
use DutchCodingCompany\FilamentSocialite\Models\Contracts\FilamentSocialiteUser as FilamentSocialiteUserContract;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        FilamentSocialite::setLoginRedirectCallback(function (string $provider, FilamentSocialiteUserContract $socialiteUser) {
            return redirect()->intended(
                TemplateResource::getUrl('index')
            );
        });

        Blade::anonymousComponentNamespace('surat.components', 'surat');
    }
}
