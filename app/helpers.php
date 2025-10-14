<?php

use App\Models\SiteSetting;

if (!function_exists('setting')) {
    /**
     * Récupère la valeur d'un paramètre du site
     *
     * @param string $key Clé du paramètre
     * @param mixed $default Valeur par défaut si le paramètre n'existe pas
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        static $settings = null;

        // Charger tous les paramètres une seule fois
        if ($settings === null) {
            $settings = SiteSetting::pluck('value', 'key')->toArray();
        }

        return $settings[$key] ?? $default;
    }
}

if (!function_exists('settings')) {
    /**
     * Récupère tous les paramètres d'un groupe
     *
     * @param string|null $group Nom du groupe
     * @return \Illuminate\Support\Collection
     */
    function settings(?string $group = null)
    {
        $query = SiteSetting::query();

        if ($group) {
            $query->where('group', $group);
        }

        return $query->pluck('value', 'key');
    }
}
