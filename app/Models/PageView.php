<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'visitor_id',
        'ip_address',
        'user_agent',
        'referrer',
        'device_type',
        'is_mobile',
        'is_bot'
    ];

    /**
     * Déterminer le type d'appareil utilisé
     */
    public static function detectDeviceType($userAgent)
    {
        $userAgent = strtolower($userAgent);

        if (strpos($userAgent, 'mobile') !== false || strpos($userAgent, 'android') !== false) {
            return 'mobile';
        } elseif (strpos($userAgent, 'tablet') !== false || strpos($userAgent, 'ipad') !== false) {
            return 'tablet';
        } else {
            return 'desktop';
        }
    }

    /**
     * Détecter si le visiteur est un robot
     */
    public static function isBot($userAgent)
    {
        $botKeywords = ['bot', 'crawler', 'spider', 'slurp', 'search', 'fetch', 'scan'];
        $userAgent = strtolower($userAgent);

        foreach ($botKeywords as $keyword) {
            if (strpos($userAgent, $keyword) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Enregistrer une vue de page
     */
    public static function track($page, $request)
    {
        $userAgent = $request->header('User-Agent');
        $deviceType = self::detectDeviceType($userAgent);
        $isBot = self::isBot($userAgent);

        // Générer un ID visiteur unique basé sur l'IP et le user agent
        $visitorId = md5($request->ip() . $userAgent);

        return self::create([
            'page' => $page,
            'visitor_id' => $visitorId,
            'ip_address' => $request->ip(),
            'user_agent' => $userAgent,
            'referrer' => $request->header('referer'),
            'device_type' => $deviceType,
            'is_mobile' => $deviceType === 'mobile',
            'is_bot' => $isBot
        ]);
    }
}
