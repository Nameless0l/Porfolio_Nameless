<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the experiences.
     */
    public function index()
    {
        $experiencesByType = Experience::ordered()->get()->groupBy('type');
        $types = Experience::types();

        return view('admin.experiences.index', compact('experiencesByType', 'types'));
    }

    /**
     * Show the form for creating a new experience.
     */
    public function create()
    {
        $types = Experience::types();
        return view('admin.experiences.create', compact('types'));
    }

    /**
     * Store a newly created experience in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'nullable|boolean',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'icon' => 'nullable|string|max:255',
        ]);

        // Si c'est une expérience actuelle, on met end_date à null
        if ($request->is_current) {
            $request->merge(['end_date' => null]);
        }

        Experience::create($request->all());

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Expérience créée avec succès.');
    }

    /**
     * Show the form for editing the specified experience.
     */
    public function edit(Experience $experience)
    {
        $types = Experience::types();
        return view('admin.experiences.edit', compact('experience', 'types'));
    }

    /**
     * Update the specified experience in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'nullable|boolean',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'icon' => 'nullable|string|max:255',
        ]);

        // Si c'est une expérience actuelle, on met end_date à null
        if ($request->is_current) {
            $request->merge(['end_date' => null]);
        }

        $experience->update($request->all());

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Expérience mise à jour avec succès.');
    }

    /**
     * Remove the specified experience from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Expérience supprimée avec succès.');
    }
}
