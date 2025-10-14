<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AboutSettingsController extends Controller
{
    /**
     * Display the about settings form.
     */
    public function edit()
    {
        $settings = SiteSetting::whereIn('key', [
            'about_me_title',
            'about_me_description',
            'about_me_additional',
            'services_section_title'
        ])->pluck('value', 'key');

        return view('admin.about.edit', compact('settings'));
    }

    /**
     * Update the about settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'about_me_title' => 'required|string|max:255',
            'about_me_description' => 'required|string',
            'about_me_additional' => 'nullable|string',
            'services_section_title' => 'required|string|max:255',
        ]);

        foreach ($validated as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'group' => 'about'
                ]
            );
        }

        return redirect()->route('admin.about-settings.edit')
            ->with('success', 'Paramètres About Me mis à jour avec succès!');
    }
}
