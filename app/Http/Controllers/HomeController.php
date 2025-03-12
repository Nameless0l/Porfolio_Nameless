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
        // Récupération des projets en vedette
        $featuredProjects = Project::where('is_featured', true)
                                   ->latest()
                                   ->take(3)
                                   ->get();

        // Récupération des compétences par catégorie
        $skillsByCategory = Skill::ordered()->get()->groupBy('category');

        // Récupération des expériences par type
        $experiences = [
            'work' => Experience::ofType('work')->ordered()->get(),
            'education' => Experience::ofType('education')->ordered()->get(),
        ];

        // Récupération des articles récents
        $recentPosts = Post::published()
                          ->latest('published_at')
                          ->take(3)
                          ->get();

        return view('home', compact(
            'featuredProjects',
            'skillsByCategory',
            'experiences',
            'recentPosts'
        ));
    }
}
