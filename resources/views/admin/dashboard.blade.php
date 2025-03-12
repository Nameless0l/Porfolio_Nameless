@extends('admin.layouts.app')

@section('title', 'Tableau de bord')
@section('header', 'Tableau de bord')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Statistiques des projets -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                <i class="fas fa-briefcase text-white text-2xl"></i>
            </div>
            <div class="mx-5">
                <h4 class="text-2xl font-semibold text-gray-700">{{ $stats['projects'] }}</h4>
                <div class="text-gray-500">Projets</div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.projects.index') }}" class="text-indigo-600 hover:text-indigo-900">
                Voir tous les projets →
            </a>
        </div>
    </div>

    <!-- Statistiques des articles -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-600 bg-opacity-75">
                <i class="fas fa-newspaper text-white text-2xl"></i>
            </div>
            <div class="mx-5">
                <h4 class="text-2xl font-semibold text-gray-700">{{ $stats['posts'] }}</h4>
                <div class="text-gray-500">Articles de blog</div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.posts.index') }}" class="text-green-600 hover:text-green-900">
                Voir tous les articles →
            </a>
        </div>
    </div>

    <!-- Statistiques des catégories -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-600 bg-opacity-75">
                <i class="fas fa-tag text-white text-2xl"></i>
            </div>
            <div class="mx-5">
                <h4 class="text-2xl font-semibold text-gray-700">{{ $stats['categories'] }}</h4>
                <div class="text-gray-500">Catégories</div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.categories.index') }}" class="text-yellow-600 hover:text-yellow-900">
                Voir toutes les catégories →
            </a>
        </div>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Articles récents -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-medium text-gray-900">Articles récents</h3>
        </div>
        <div class="divide-y divide-gray-200">
            @forelse($recentPosts as $post)
                <div class="px-6 py-4 flex items-center">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900">{{ $post->title }}</h4>
                        <p class="text-sm text-gray-500">{{ $post->published_at ? $post->published_at->format('d/m/Y') : 'Non publié' }}</p>
                    </div>
                    <div>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $post->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $post->status === 'published' ? 'Publié' : 'Brouillon' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="px-6 py-4 text-center text-gray-500">
                    Aucun article récent
                </div>
            @endforelse
        </div>
        <div class="px-6 py-4 bg-gray-50">
            <a href="{{ route('admin.posts.create') }}" class="text-indigo-600 hover:text-indigo-900">
                Ajouter un nouvel article →
            </a>
        </div>
    </div>

    <!-- Projets récents -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-medium text-gray-900">Projets récents</h3>
        </div>
        <div class="divide-y divide-gray-200">
            @forelse($recentProjects as $project)
                <div class="px-6 py-4 flex items-center">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900">{{ $project->title }}</h4>
                        <p class="text-sm text-gray-500">{{ $project->type }}</p>
                    </div>
                    <div>
                        @if($project->is_featured)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                En vedette
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="px-6 py-4 text-center text-gray-500">
                    Aucun projet récent
                </div>
            @endforelse
        </div>
        <div class="px-6 py-4 bg-gray-50">
            <a href="{{ route('admin.projects.create') }}" class="text-indigo-600 hover:text-indigo-900">
                Ajouter un nouveau projet →
            </a>
        </div>
    </div>
</div>
@endsection
