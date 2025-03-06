<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $stats = [
            'posts' => [
                'total' => Post::count(),
                'published' => Post::where('status', 'published')->count(),
                'draft' => Post::where('status', 'draft')->count(),
            ],
            'projects' => [
                'total' => Project::count(),
                'personal' => Project::where('type', 'personal')->count(),
                'professional' => Project::where('type', 'professional')->count(),
                'academic' => Project::where('type', 'academic')->count(),
            ],
            'categories' => Category::count(),
        ];

        $recentPosts = Post::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentProjects'));
    }
}
