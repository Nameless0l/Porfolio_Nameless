<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Affiche la page de connexion ou traite la tentative de connexion
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $adminPassword = env('ADMIN_PASSWORD', 'admin_password');

            if ($request->password === $adminPassword) {
                session(['admin_access' => true]);
                return redirect()->route('admin.dashboard');
            }

            return back()->with('error', 'Mot de passe incorrect.');
        }

        return view('admin.login');
    }

    /**
     * Affiche le tableau de bord de l'administration
     */
    public function dashboard()
    {
        $stats = [
            'posts' => Post::count(),
            'projects' => Project::count(),
            'categories' => Category::count(),
        ];

        $recentPosts = Post::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentProjects'));
    }

    /**
     * Déconnecte l'utilisateur de l'administration
     */
    public function logout()
    {
        session()->forget('admin_access');
        return redirect()->route('admin.login')->with('success', 'Vous avez été déconnecté.');
    }
}
