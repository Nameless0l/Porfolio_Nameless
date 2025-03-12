<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'percentage',
        'category',
        'icon',
        'order',
        'description'
    ];

    /**
     * Liste des catégories disponibles
     */
    public static function categories()
    {
        return [
            'developpement_web' => 'Développement Web',
            'developpement_mobile' => 'Développement Mobile',
            'intelligence_artificielle' => 'Intelligence Artificielle',
            'base_de_donnees' => 'Base de données',
            'devops' => 'DevOps',
            'design' => 'Design'
        ];
    }

    /**
     * Retourne la catégorie formatée
     */
    public function getCategoryNameAttribute()
    {
        $categories = self::categories();
        return $categories[$this->category] ?? $this->category;
    }

    /**
     * Trie les compétences par ordre
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }

    /**
     * Filtre par catégorie
     */
    public function scopeOfCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
