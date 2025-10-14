@extends('admin.layouts.app')

@section('title', 'Ajouter un service')
@section('header', 'Ajouter un service')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 gap-6">
                <!-- Titre -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre du service *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        placeholder="Ex: Développement Backend"
                        required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        placeholder="Décrivez ce service en quelques phrases..."
                        required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">Cette description sera affichée sur votre portfolio.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Icône -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700">Icône</label>
                        <div class="mt-1">
                            <input type="file" name="icon" id="icon" accept="image/*"
                                class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100
                                    cursor-pointer">
                        </div>
                        @error('icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-2 text-sm text-gray-500">
                            Formats acceptés: JPG, PNG, GIF, SVG (max 2MB)<br>
                            Recommandé: icône SVG 40x40px
                        </p>
                        <p class="mt-2 text-xs text-blue-600">
                            💡 Ou laissez vide pour utiliser une icône par défaut
                        </p>
                    </div>

                    <!-- Ordre -->
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700">
                            Ordre d'affichage
                        </label>
                        <input type="number" name="order" id="order" value="{{ old('order', $nextOrder ?? 0) }}"
                            min="0"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">
                            Suggéré: <strong>{{ $nextOrder ?? 0 }}</strong><br>
                            Les services sont triés par ordre croissant.
                        </p>
                    </div>
                </div>

                <!-- Statut actif -->
                <div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_active" class="font-medium text-gray-700">Service actif</label>
                            <p class="text-gray-500">Les services inactifs ne seront pas visibles sur le portfolio public.</p>
                        </div>
                    </div>
                    @error('is_active')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('services.index') }}"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-times mr-1"></i> Annuler
                </a>
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-save mr-2"></i> Enregistrer le service
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
            <h3 class="text-sm font-medium text-yellow-800">Conseils</h3>
            <div class="mt-2 text-sm text-yellow-700">
                <ul class="list-disc pl-5 space-y-1">
                    <li>Utilisez un titre court et descriptif (ex: "Développement Backend", "Machine Learning")</li>
                    <li>La description doit être concise mais informative (2-3 phrases)</li>
                    <li>Pour l'icône, privilégiez les fichiers SVG pour une meilleure qualité</li>
                    <li>L'ordre détermine la position du service (1 = premier, 2 = deuxième, etc.)</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
