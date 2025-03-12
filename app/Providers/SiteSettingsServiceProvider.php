<?php

namespace App\Providers;

use Schema;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SiteSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Si la table existe, charger les paramètres globaux
        try {
            if (Schema::hasTable('site_settings')) {
                // Partager les paramètres avec toutes les vues
                $this->shareSettingsWithViews();
            }
        } catch (\Exception $e) {
            // La table n'existe probablement pas encore (migrations pas exécutées)
        }
    }

    /**
     * Partage les paramètres avec toutes les vues
     */
    protected function shareSettingsWithViews(): void
    {
        // Paramètres généraux
        $generalSettings = SiteSetting::where('group', 'general')->get()->pluck('value', 'key');
        View::share('generalSettings', $generalSettings);

        // Informations personnelles
        $personalSettings = SiteSetting::where('group', 'personal')->get()->pluck('value', 'key');
        View::share('personalSettings', $personalSettings);

        // Réseaux sociaux
        $socialSettings = SiteSetting::where('group', 'social')->get()->pluck('value', 'key');
        View::share('socialSettings', $socialSettings);

        // SEO
        $seoSettings = SiteSetting::where('group', 'seo')->get()->pluck('value', 'key');
        View::share('seoSettings', $seoSettings);
    }
}
