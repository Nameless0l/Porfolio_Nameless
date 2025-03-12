@extends('admin.layouts.app')

@section('title', 'Gestion des expériences')
@section('header', 'Gestion des expériences')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-lg font-medium text-gray-900">Liste des expériences</h3>
    <a href="{{ route('admin.experiences.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i> Ajouter une expérience
    </a>
</div>

@foreach($types as $typeKey => $typeName)
    @if(isset($experiencesByType[$typeKey]) && count($experiencesByType[$typeKey]) > 0)
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6 bg-gray-50">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $typeName }}</h3>
            </div>
            <div class="border-t border-gray-200">
                <ul class="divide-y divide-gray-200">
                    @foreach($experiencesByType[$typeKey] as $experience)
                        <li class="px-4 py-4 sm:px-6 flex items-center justify-between">
                            <div class="flex items-center">
                                @if($experience->icon)
                                    <span class="mr-3 text-lg">
                                        <i class="{{ $experience->icon }}"></i>
                                    </span>
                                @endif
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900">{{ $experience->title }}</h4>
                                    <p class="text-sm text-gray-500">
                                        @if($experience->company)
                                            {{ $experience->company }}
                                            @if($experience->location)
                                                - {{ $experience->location }}
                                            @endif
                                        @endif
                                    </p>
                                    <p class="text-xs text-gray-500">{{ $experience->formatted_date_range }}</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.experiences.edit', $experience) }}" class="text-indigo-600 hover:text-indigo-900" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette expérience?')">
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

@if(count($experiencesByType) === 0)
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
        <div class="px-4 py-12 text-center text-gray-500">
            <p>Aucune expérience n'a été ajoutée.</p>
            <a href="{{ route('admin.experiences.create') }}" class="mt-2 inline-block text-indigo-600 hover:text-indigo-900">
                Ajouter votre première expérience
            </a>
        </div>
    </div>
@endif
@endsection
