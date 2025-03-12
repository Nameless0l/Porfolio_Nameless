<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'description',
        'type',
        'order',
        'icon'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
    ];

    /**
     * Liste des types d'expérience disponibles
     */
    public static function types()
    {
        return [
            'work' => 'Expérience professionnelle',
            'education' => 'Formation',
            'certification' => 'Certification',
            'achievement' => 'Réalisation'
        ];
    }

    /**
     * Retourne le type formaté
     */
    public function getTypeNameAttribute()
    {
        $types = self::types();
        return $types[$this->type] ?? $this->type;
    }

    /**
     * Format de date pour l'affichage
     */
    public function getFormattedDateRangeAttribute()
    {
        $startDate = $this->start_date->format('M Y');

        if ($this->is_current) {
            return $startDate . ' - Présent';
        }

        if ($this->end_date) {
            return $startDate . ' - ' . $this->end_date->format('M Y');
        }

        return $startDate;
    }

    /**
     * Trie les expériences par ordre puis par date (plus récent d'abord)
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')
                     ->orderBy('start_date', 'desc')
                     ->orderBy('title');
    }

    /**
     * Filtre par type d'expérience
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
