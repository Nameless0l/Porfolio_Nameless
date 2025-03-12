@extends('admin.layouts.app')

@section('title', 'Gestion des projets')
@section('header', 'Gestion des projets')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-lg font-medium text-gray-900">Liste des projets</h3>
    <a href="{{ route('admin.projects.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i> Ajouter un projet
    </a>
</div>

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between bg-gray-50">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Tous les projets</h3>
        <span class="text-sm text-gray-500">Total : {{ $projects->total() }} projets</span>
    </div>
    <div class="border-t border-gray-200">
        @if(count($projects) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">En vedette</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($projects as $project)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($project->image)
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-md object-cover" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                                            </div>
                                        @else
                                            <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-md flex items-center justify-center">
                                                <i class="fas fa-briefcase text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $project->title }}</div>
                                            <div class="text-sm text-gray-500 truncate" style="max-width: 300px;">{{ $project->description }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if($project->type === 'personal') bg-green-100 text-green-800
                                        @elseif($project->type === 'professional') bg-blue-100 text-blue-800
                                        @else bg-purple-100 text-purple-800 @endif">
                                        {{ ucfirst($project->type) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $project->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($project->is_featured)
                                        <span class="text-green-600"><i class="fas fa-star"></i> Oui</span>
                                    @else
                                        <span class="text-gray-400">Non</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</a>
                                    <form class="inline-block" action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6">
                {{ $projects->links() }}
            </div>
        @else
            <div class="px-4 py-12 text-center">
                <p class="text-gray-500">Aucun projet n'a été ajouté.</p>
                <a href="{{ route('admin.projects.create') }}" class="mt-2 inline-block text-indigo-600 hover:text-indigo-900">
                    Ajouter votre premier projet
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
