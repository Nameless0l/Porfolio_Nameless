@extends('admin.layouts.app')

@section('title', 'Modifier le service')
@section('header', 'Modifier le service')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <!-- Titre -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre du service *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
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
                        required>{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Icône -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700">Icône</label>
                        
                        @if($service->icon)
                            <div class="mt-2 mb-3">
                                <p class="text-sm text-gray-600 mb-2">Icône actuelle:</p>
                                <div class="inline-flex items-center justify-center p-3 bg-gray-50 rounded-lg border border-gray-200">
                                    @if(str_starts_with($service->icon, 'services/'))
                                        <img src="{{ asset('storage/' . $service->icon) }}" alt="icône actuelle" class="h-12 w-12 object-contain">
                                    @else
                                        <img src="{{ asset($service->icon) }}" alt="icône actuelle" class="h-12 w-12 object-contain">
                                    @endif
                                </div>
                            </div>
                        @endif

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
                            Laissez vide pour conserver l'icône actuelle
                        </p>
                    </div>

                    <!-- Ordre -->
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700">
                            Ordre d'affichage
                        </label>
                        <input type="number" name="order" id="order" value="{{ old('order', $service->order) }}"
                            min="0"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">
                            Les services sont triés par ordre croissant.
                        </p>
                    </div>
                </div>

                <!-- Statut actif -->
                <div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-md">
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

                <!-- Informations de création/modification -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-sm text-gray-600 space-y-1">
                        <p><strong>Créé le:</strong> {{ $service->created_at->format('d/m/Y à H:i') }}</p>
                        <p><strong>Dernière modification:</strong> {{ $service->updated_at->format('d/m/Y à H:i') }}</p>
                    </div>
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
                    <i class="fas fa-save mr-2"></i> Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
