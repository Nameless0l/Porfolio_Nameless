@extends('admin.layouts.app')

@section('title', 'Gestion des services')
@section('header', 'Gestion des services')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-lg font-medium text-gray-900">Liste des services - "Ce que je fais"</h3>
    <a href="{{ route('services.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i> Ajouter un service
    </a>
</div>

@if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between bg-gray-50">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Tous les services</h3>
        <span class="text-sm text-gray-500">Total : {{ $services->count() }} services</span>
    </div>
    <div class="border-t border-gray-200">
        @if(count($services) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icône</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ordre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($services as $service)
                            <tr class="{{ !$service->is_active ? 'bg-gray-50 opacity-75' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($service->icon)
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if(str_starts_with($service->icon, 'services/'))
                                                <img class="h-10 w-10 rounded object-contain" src="{{ asset('storage/' . $service->icon) }}" alt="icône">
                                            @else
                                                <img class="h-10 w-10 rounded object-contain" src="{{ asset($service->icon) }}" alt="icône">
                                            @endif
                                        </div>
                                    @else
                                        <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded flex items-center justify-center">
                                            <i class="fas fa-cog text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $service->title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 truncate" style="max-width: 400px;">{{ $service->description }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-900">{{ $service->order }}</span>
                                        @if($service->order == 0)
                                            <span class="ml-1 text-xs text-gray-400">(auto)</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($service->is_active)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i> Actif
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            <i class="fas fa-times-circle mr-1"></i> Inactif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('services.edit', $service) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <form class="inline-block" action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="px-4 py-12 text-center">
                <i class="fas fa-briefcase text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-500 mb-2">Aucun service n'a été ajouté.</p>
                <p class="text-sm text-gray-400 mb-4">Les services apparaissent dans la section "Ce que je fais" de votre portfolio.</p>
                <a href="{{ route('services.create') }}" class="inline-block text-indigo-600 hover:text-indigo-900">
                    <i class="fas fa-plus mr-1"></i> Ajouter votre premier service
                </a>
            </div>
        @endif
    </div>
</div>

<div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="fas fa-info-circle text-blue-400 text-xl"></i>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-blue-800">À propos des services</h3>
            <div class="mt-2 text-sm text-blue-700">
                <ul class="list-disc pl-5 space-y-1">
                    <li>Les services sont affichés dans la section "Ce que je fais" de votre page About Me</li>
                    <li>Utilisez le champ "Ordre" pour contrôler l'ordre d'affichage (ordre croissant)</li>
                    <li>Les services inactifs ne seront pas visibles sur le portfolio public</li>
                    <li>Vous pouvez utiliser une icône existante ou télécharger une nouvelle icône SVG/PNG</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
