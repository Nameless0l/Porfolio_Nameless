@extends('admin.layouts.app')

@section('title', 'Gestion des articles')
@section('header', 'Gestion des articles')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-lg font-medium text-gray-900">Liste des articles</h3>
    <a href="{{ route('admin.posts.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i> Ajouter un article
    </a>
</div>

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between bg-gray-50">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Tous les articles</h3>
        <span class="text-sm text-gray-500">Total : {{ $posts->total() }} articles</span>
    </div>
    <div class="border-t border-gray-200">
        @if(count($posts) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($post->featured_image)
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-md object-cover" src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                                            </div>
                                        @else
                                            <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-md flex items-center justify-center">
                                                <i class="fas fa-newspaper text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $post->title }}</div>
                                            <div class="text-sm text-gray-500 truncate" style="max-width: 300px;">{{ $post->excerpt }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($post->category)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $post->category->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">Non catégorisé</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $post->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $post->status === 'published' ? 'Publié' : 'Brouillon' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($post->published_at)
                                        <span title="{{ $post->published_at->format('d/m/Y H:i') }}">
                                            {{ $post->published_at->format('d/m/Y') }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</a>
                                    <form class="inline-block" action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article?');">
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
                {{ $posts->links() }}
            </div>
        @else
            <div class="px-4 py-12 text-center">
                <p class="text-gray-500">Aucun article n'a été ajouté.</p>
                <a href="{{ route('admin.posts.create') }}" class="mt-2 inline-block text-indigo-600 hover:text-indigo-900">
                    Ajouter votre premier article
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
