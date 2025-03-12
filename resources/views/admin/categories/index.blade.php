@extends('admin.layouts.app')

@section('title', 'Gestion des catégories')
@section('header', 'Gestion des catégories')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-lg font-medium text-gray-900">Liste des catégories</h3>
    <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i> Ajouter une catégorie
    </a>
</div>

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between bg-gray-50">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Toutes les catégories</h3>
        <span class="text-sm text-gray-500">Total : {{ count($categories) }} catégories</span>
    </div>
    <div class="border-t border-gray-200">
        @if(count($categories) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Articles</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($category->icon)
                                            <span class="text-gray-500 mr-2">
                                                <i class="{{ $category->icon }}"></i>
                                            </span>
                                        @endif
                                        <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $category->slug }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $category->posts_count ?? 0 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</a>
                                    <form class="inline-block" action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie?');">
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
        @else
            <div class="px-4 py-12 text-center">
                <p class="text-gray-500">Aucune catégorie n'a été ajoutée.</p>
                <a href="{{ route('admin.categories.create') }}" class="mt-2 inline-block text-indigo-600 hover:text-indigo-900">
                    Ajouter votre première catégorie
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
