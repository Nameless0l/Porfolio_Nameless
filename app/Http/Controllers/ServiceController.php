<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::ordered()->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nextOrder = Service::max('order') + 1;
        return view('admin.services.create', compact('nextOrder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        // Gérer l'upload de l'icône
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('services', 'public');
            $validated['icon'] = $iconPath;
        }

        $validated['is_active'] = $request->has('is_active');

        Service::create($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service créé avec succès!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        // Gérer l'upload de la nouvelle icône
        if ($request->hasFile('icon')) {
            // Supprimer l'ancienne icône si elle existe et qu'elle est dans storage
            if ($service->icon && str_starts_with($service->icon, 'services/')) {
                Storage::disk('public')->delete($service->icon);
            }
            
            $iconPath = $request->file('icon')->store('services', 'public');
            $validated['icon'] = $iconPath;
        }

        $validated['is_active'] = $request->has('is_active');

        $service->update($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Supprimer l'icône si elle existe et qu'elle est dans storage
        if ($service->icon && str_starts_with($service->icon, 'services/')) {
            Storage::disk('public')->delete($service->icon);
        }

        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service supprimé avec succès!');
    }
}
