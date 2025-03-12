@extends('admin.layouts.app')

@section('title', 'Mon profil')
@section('header', 'Mon profil')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <form action="{{ route('admin.settings.update-profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1">
                    <div class="text-center">
                        <div class="mt-2 mb-4">
                            @if(App\Models\SiteSetting::get('profile_photo'))
                                <img src="{{ asset('storage/' . App\Models\SiteSetting::get('profile_photo')) }}" alt="Photo de profil"
                                     class="w-40 h-40 rounded-full mx-auto object-cover border-4 border-gray-200">
                            @else
                                <div class="w-40 h-40 rounded-full mx-auto flex items-center justify-center bg-gray-100 text-gray-400 border-4 border-gray-200">
                                    <i class="fas fa-user text-6xl"></i>
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-center">
                            <label for="profile_photo" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span>Changer de photo</span>
                                <input id="profile_photo" name="profile_photo" type="file" class="sr-only" accept="image/*">
                            </label>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF jusqu'à 2MB</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900">Réseaux sociaux</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Vous pouvez gérer vos liens de réseaux sociaux dans la section
                            <a href="{{ route('admin.settings.index', 'social') }}" class="text-indigo-600 hover:text-indigo-500">
                                Paramètres > Réseaux sociaux
                            </a>.
                        </p>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Informations personnelles</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Ces informations seront affichées publiquement sur votre portfolio.
                        </p>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="owner_name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                            <input type="text" name="owner_name" id="owner_name" value="{{ App\Models\SiteSetting::get('owner_name') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('owner_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="owner_title" class="block text-sm font-medium text-gray-700">Titre professionnel</label>
                            <input type="text" name="owner_title" id="owner_title" value="{{ App\Models\SiteSetting::get('owner_title') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('owner_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="owner_email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                            <input type="email" name="owner_email" id="owner_email" value="{{ App\Models\SiteSetting::get('owner_email') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('owner_email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="owner_phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="text" name="owner_phone" id="owner_phone" value="{{ App\Models\SiteSetting::get('owner_phone') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('owner_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="owner_location" class="block text-sm font-medium text-gray-700">Localisation</label>
                            <input type="text" name="owner_location" id="owner_location" value="{{ App\Models\SiteSetting::get('owner_location') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('owner_location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="owner_birthday" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                            <input type="text" name="owner_birthday" id="owner_birthday" value="{{ App\Models\SiteSetting::get('owner_birthday') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                placeholder="Exemple: October 09, 2001">
                            @error('owner_birthday')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Mettre à jour le profil
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Prévisualisation de l'image
    document.getElementById('profile_photo').addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgElement = document.querySelector('.md\\:col-span-1 img');

                if (imgElement) {
                    imgElement.src = e.target.result;
                } else {
                    const placeholderDiv = document.querySelector('.md\\:col-span-1 .w-40.h-40');

                    if (placeholderDiv) {
                        placeholderDiv.innerHTML = '';

                        const newImg = document.createElement('img');
                        newImg.src = e.target.result;
                        newImg.alt = 'Photo de profil';
                        newImg.className = 'w-40 h-40 rounded-full object-cover';

                        placeholderDiv.appendChild(newImg);
                    }
                }
            }

            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
