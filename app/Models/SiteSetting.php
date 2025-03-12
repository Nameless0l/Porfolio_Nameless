<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group'
    ];

    /**
     * Retourne une valeur de configuration
     */
    public static function get($key, $default = null)
    {
        // Mise en cache pour améliorer les performances
        return Cache::rememberForever('setting_' . $key, function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Définit une valeur de configuration
     */
    public static function set($key, $value, $group = 'general')
    {
        $setting = self::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );

        // Vider le cache pour cette clé
        Cache::forget('setting_' . $key);

        return $setting;
    }

    /**
     * Retourne toutes les configurations d'un groupe
     */
    public static function getGroup($group)
    {
        return self::where('group', $group)->get()->pluck('value', 'key')->toArray();
    }

    /**
     * Récupère tous les groupes disponibles
     */
    public static function getGroups()
    {
        return self::select('group')->distinct()->pluck('group')->toArray();
    }

    /**
     * Vide le cache pour toutes les configurations
     */
    public static function clearCache()
    {
        $settings = self::all();

        foreach ($settings as $setting) {
            Cache::forget('setting_' . $setting->key);
        }

        return true;
    }
}
