@extends('admin.layouts.app')

@section('title', 'Gestion des compétences')
@section('header', 'Gestion des compétences')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-lg font-medium text-gray-900">Liste des compétences</h3>
    <a href="{{ route('admin.skills.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i> Ajouter une compétence
    </a>
</div>

@foreach($categories as $categoryKey => $categoryName)
    @if(isset($skillsByCategory[$categoryKey]) && count($skillsByCategory[$categoryKey]) > 0)
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6 bg-gray-50">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $categoryName }}</h3>
            </div>
            <div class="border-t border-gray-200">
                <ul class="divide-y divide-gray-200">
                    @foreach($skillsByCategory[$categoryKey] as $skill)
                        <li class="px-4 py-4 sm:px-6 flex items-center justify-between">
                            <div class="flex items-center">
                                @if($skill->icon)
                                    <span class="mr-3 text-lg">
                                        <i class="{{ $skill->icon }}"></i>
                                    </span>
                                @endif
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900">{{ $skill->name }}</h4>
                                    <p class="text-sm text-gray-500">Maîtrise: {{ $skill->percentage }}%</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="text-indigo-600 hover:text-indigo-900" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette compétence?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endforeach

@if(count($skillsByCategory) === 0)
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
        <div class="px-4 py-12 text-center text-gray-500">
            <p>Aucune compétence n'a été ajoutée.</p>
            <a href="{{ route('admin.skills.create') }}" class="mt-2 inline-block text-indigo-600 hover:text-indigo-900">
                Ajouter votre première compétence
            </a>
        </div>
    </div>
@endif
@endsection
