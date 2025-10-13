<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Category;
use App\Models\Experience;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil du portfolio
     */
    public function index()
    {
        // Récupère TOUS les projets (pas seulement featured) avec ordre correct
        $projects = Project::ordered()->get();

        // Récupère les types distincts de projets pour les onglets dynamiques
        $projectTypes = Project::select('type')
                               ->distinct()
                               ->orderBy('type')
                               ->pluck('type')
                               ->map(function($type) {
                                   return [
                                       'slug' => $type,
                                       'name' => $this->formatProjectType($type)
                                   ];
                               });

        $skillsByCategory = Skill::ordered()->get()->groupBy('category');

        $experiences = [
            'work' => Experience::ofType('work')->ordered()->get(),
            'education' => Experience::ofType('education')->ordered()->get(),
        ];

        // Récupère les articles publiés (le scope published() gère déjà l'ordre correct)
        $recentPosts = Post::published()->get();

        return view('home', compact(
            'projects',
            'projectTypes',
            'skillsByCategory',
            'experiences',
            'recentPosts'
        ));
    }

    /**
     * Formate le nom du type de projet pour l'affichage
     */
    private function formatProjectType($type)
    {
        $types = [
            'personal' => 'Personnel',
            'professional' => 'Professionnel',
            'academic' => 'Académique',
            'web' => 'Développement Web',
            'mobile' => 'Développement Mobile',
            'ai' => 'Intelligence Artificielle',
            'data' => 'Science des Données',
            'design' => 'Design',
            'other' => 'Autre'
        ];

        return $types[$type] ?? ucfirst($type);
    }
}
