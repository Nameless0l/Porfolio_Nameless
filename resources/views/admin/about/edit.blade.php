@extends('admin.layouts.app')

@section('title', 'Paramètres About Me')
@section('header', 'Paramètres About Me')

@section('content')
@if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <div class="mb-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Configuration de la section About Me
            </h3>
            <p class="mt-1 text-sm text-gray-500">
                Ces informations seront affichées sur la page "About" de votre portfolio.
            </p>
        </div>

        <form action="{{ route('about-settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Titre de la section About Me -->
                <div>
                    <label for="about_me_title" class="block text-sm font-medium text-gray-700">
                        Titre de la section *
                    </label>
                    <input type="text" name="about_me_title" id="about_me_title" 
                        value="{{ old('about_me_title', $settings['about_me_title'] ?? 'About me') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>
                    @error('about_me_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">
                        Par exemple: "About me", "À propos", "Qui suis-je?"
                    </p>
                </div>

                <!-- Description principale -->
                <div>
                    <label for="about_me_description" class="block text-sm font-medium text-gray-700">
                        Description principale *
                    </label>
                    <textarea name="about_me_description" id="about_me_description" rows="6"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>{{ old('about_me_description', $settings['about_me_description'] ?? '') }}</textarea>
                    @error('about_me_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">
                        Présentez-vous en quelques paragraphes. Parlez de votre parcours, vos compétences et vos passions.
                    </p>
                </div>

                <!-- Description additionnelle -->
                <div>
                    <label for="about_me_additional" class="block text-sm font-medium text-gray-700">
                        Description additionnelle
                        <span class="text-gray-400 font-normal">(optionnel)</span>
                    </label>
                    <textarea name="about_me_additional" id="about_me_additional" rows="3"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('about_me_additional', $settings['about_me_additional'] ?? '') }}</textarea>
                    @error('about_me_additional')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">
                        Informations complémentaires à afficher après la description principale.
                    </p>
                </div>

                <hr class="my-6 border-gray-200">

                <!-- Titre de la section Services -->
                <div>
                    <label for="services_section_title" class="block text-sm font-medium text-gray-700">
                        Titre de la section "Ce que je fais" *
                    </label>
                    <input type="text" name="services_section_title" id="services_section_title" 
                        value="{{ old('services_section_title', $settings['services_section_title'] ?? 'Ce que je fais') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        required>
                    @error('services_section_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">
                        Par exemple: "Ce que je fais", "Mes services", "What I do"
                    </p>
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400 text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Note</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <p>Les services eux-mêmes (avec leurs icônes et descriptions) se gèrent dans la section 
                                    <a href="{{ route('services.index') }}" class="font-medium underline">Gestion des services</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.dashboard') }}"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-arrow-left mr-1"></i> Retour au tableau de bord
                </a>
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-save mr-2"></i> Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>

<div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="fas fa-lightbulb text-yellow-400 text-xl"></i>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-yellow-800">Conseils de rédaction</h3>
            <div class="mt-2 text-sm text-yellow-700">
                <ul class="list-disc pl-5 space-y-1">
                    <li>Soyez authentique et personnel dans votre description</li>
                    <li>Mettez en avant vos points forts et votre expertise</li>
                    <li>Utilisez un ton professionnel mais accessible</li>
                    <li>Pour créer un saut de ligne, utilisez simplement la touche Entrée</li>
                    <li>Relisez bien votre texte avant de sauvegarder</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
