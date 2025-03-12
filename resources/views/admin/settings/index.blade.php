@extends('admin.layouts.app')

@section('title', 'Paramètres du site')
@section('header', 'Paramètres du site')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div class="flex space-x-2">
        @foreach($groups as $groupKey => $groupName)
            <a href="{{ route('admin.settings.index', $groupKey) }}"
               class="px-4 py-2 text-sm font-medium {{ $group === $groupKey ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }} rounded-md shadow-sm">
                {{ $groupName }}
            </a>
        @endforeach
    </div>

    <a href="{{ route('admin.settings.clear-cache') }}"
       class="text-sm text-indigo-600 hover:text-indigo-900"
       onclick="return confirm('Êtes-vous sûr de vouloir vider le cache ?')">
        <i class="fas fa-sync-alt mr-1"></i> Vider le cache
    </a>
</div>

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <form action="{{ route('admin.settings.update', $group) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                @foreach($settings as $setting)
                    <div>
                        <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700">
                            {{ ucfirst(str_replace(['_', '-'], ' ', $setting->key)) }}
                        </label>

                        @if(strpos($setting->key, 'description') !== false || strpos($setting->key, 'keywords') !== false)
                            <textarea name="{{ $setting->key }}" id="{{ $setting->key }}" rows="3"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $setting->value }}</textarea>
                        @elseif(strpos($setting->key, 'url') !== false)
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                    <i class="fas fa-link"></i>
                                </span>
                                <input type="url" name="{{ $setting->key }}" id="{{ $setting->key }}" value="{{ $setting->value }}"
                                    class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
                            </div>
                        @elseif(strpos($setting->key, 'email') !== false)
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="{{ $setting->key }}" id="{{ $setting->key }}" value="{{ $setting->value }}"
                                    class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
                            </div>
                        @elseif(strpos($setting->key, 'phone') !== false)
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}" value="{{ $setting->value }}"
                                    class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
                            </div>
                        @else
                            <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}" value="{{ $setting->value }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @endif

                        @error($setting->key)
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
