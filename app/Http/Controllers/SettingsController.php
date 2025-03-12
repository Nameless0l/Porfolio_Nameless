<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    /**
     * Affiche les paramètres du site par groupe
     */
    public function index($group = 'general')
    {
        $groups = [
            'general' => 'Paramètres généraux',
            'personal' => 'Informations personnelles',
            'social' => 'Réseaux sociaux',
            'seo' => 'SEO et analytiques'
        ];

        $settings = SiteSetting::where('group', $group)->get();

        return view('admin.settings.index', compact('settings', 'groups', 'group'));
    }

    /**
     * Met à jour les paramètres du site
     */
    public function update(Request $request, $group)
    {
        $inputs = $request->except('_token', '_method');

        foreach ($inputs as $key => $value) {
            SiteSetting::set($key, $value, $group);
        }

        return redirect()->route('admin.settings.index', $group)
            ->with('success', 'Paramètres mis à jour avec succès.');
    }

    /**
     * Vide le cache de tous les paramètres
     */
    public function clearCache()
    {
        SiteSetting::clearCache();

        return redirect()->back()->with('success', 'Cache des paramètres vidé avec succès.');
    }

    /**
     * Affiche la page de profil
     */
    public function profile()
    {
        $personalSettings = SiteSetting::where('group', 'personal')->get()->pluck('value', 'key');
        $socialSettings = SiteSetting::where('group', 'social')->get()->pluck('value', 'key');

        return view('admin.settings.profile', compact('personalSettings', 'socialSettings'));
    }

    /**
     * Met à jour le profil
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'owner_title' => 'required|string|max:255',
            'owner_email' => 'required|email|max:255',
            'owner_phone' => 'required|string|max:255',
            'owner_location' => 'required|string|max:255',
            'owner_birthday' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Mise à jour des informations personnelles
        foreach ($request->except('_token', '_method', 'profile_photo') as $key => $value) {
            SiteSetting::set($key, $value, 'personal');
        }

        // Gestion de la photo de profil
        if ($request->hasFile('profile_photo')) {
            $imagePath = $request->file('profile_photo')->store('profile', 'public');
            SiteSetting::set('profile_photo', $imagePath, 'personal');
        }

        return redirect()->route('admin.settings.profile')
            ->with('success', 'Profil mis à jour avec succès.');
    }
}
