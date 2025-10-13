<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Utilise le scope ordered() pour afficher dans le même ordre que sur le site
        $projects = Project::ordered()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Suggérer le prochain numéro d'ordre (max actuel + 1)
        $nextOrder = Project::max('order') + 1;
        
        return view('admin.projects.create', compact('nextOrder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'type' => 'required|in:personal,professional,academic',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string',
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->long_description = $request->long_description;
        $project->link = $request->link;
        $project->github_link = $request->github_link;
        $project->type = $request->type;
        $project->is_featured = $request->has('is_featured');
        $project->order = $request->order ?? 0;
        $project->technologies = $request->technologies;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image = $imagePath;
        }

        $project->save();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'type' => 'required|in:personal,professional,academic',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string',
        ]);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->long_description = $request->long_description;
        $project->link = $request->link;
        $project->github_link = $request->github_link;
        $project->type = $request->type;
        $project->is_featured = $request->has('is_featured');
        $project->order = $request->order ?? 0;
        $project->technologies = $request->technologies;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image = $imagePath;
        }

        $project->save();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete image if exists
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    /**
     * Display the public projects index.
     */
    public function publicIndex()
    {
        $featuredProjects = Project::featured()->latest()->take(3)->get();
        $personalProjects = Project::personal()->latest()->get();
        $professionalProjects = Project::professional()->latest()->get();
        $academicProjects = Project::academic()->latest()->get();

        return view('projects.index', compact(
            'featuredProjects',
            'personalProjects',
            'professionalProjects',
            'academicProjects'
        ));
    }

    /**
     * Display a single project details.
     */
    public function publicShow($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $relatedProjects = Project::where('type', $project->type)
                                ->where('id', '!=', $project->id)
                                ->limit(3)
                                ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
