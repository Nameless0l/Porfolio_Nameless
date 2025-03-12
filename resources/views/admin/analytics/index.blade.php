@extends('admin.layouts.app')

@section('title', 'Statistiques')
@section('header', 'Statistiques de visites')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-2">Vues de pages</h3>
        <p class="text-3xl font-bold text-indigo-600">{{ number_format($totalViews) }}</p>
        <p class="text-sm text-gray-500">Les 30 derniers jours</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-2">Visiteurs uniques</h3>
        <p class="text-3xl font-bold text-green-600">{{ number_format($totalUniqueVisitors) }}</p>
        <p class="text-sm text-gray-500">Les 30 derniers jours</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-2">Taux de conversion</h3>
        <p class="text-3xl font-bold text-yellow-600">
            {{ $totalViews > 0 ? number_format(($totalUniqueVisitors / $totalViews) * 100, 1) : 0 }}%
        </p>
        <p class="text-sm text-gray-500">Visiteurs uniques / Vues de pages</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow mb-8">
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Visites par jour</h3>
    </div>
    <div class="px-4 py-5 sm:p-6">
        <canvas id="dailyViewsChart" height="300"></canvas>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="bg-white rounded-lg shadow">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Pages les plus visitées</h3>
        </div>
        <div class="px-4 py-5 sm:p-6">
            @if(count($topPages) > 0)
                <ul class="divide-y divide-gray-200">
                    @foreach($topPages as $page)
                        <li class="py-3 flex justify-between">
                            <span class="text-gray-700">{{ $page->page }}</span>
                            <span class="text-gray-500">{{ number_format($page->views) }} vues</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500 text-center">Aucune donnée disponible</p>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-lg shadow">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Sources de trafic</h3>
        </div>
        <div class="px-4 py-5 sm:p-6">
            @if(count($topReferrers) > 0)
                <ul class="divide-y divide-gray-200">
                    @foreach($topReferrers as $referrer)
                        <li class="py-3 flex justify-between">
                            <span class="text-gray-700 truncate" style="max-width: 80%;">{{ $referrer->referrer }}</span>
                            <span class="text-gray-500">{{ number_format($referrer->views) }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500 text-center">Aucune donnée disponible</p>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-lg shadow">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Appareils utilisés</h3>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <canvas id="devicesChart" height="300"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script>
    // Graph des visites quotidiennes
    const dailyViewsCtx = document.getElementById('dailyViewsChart').getContext('2d');
    const dailyViewsChart = new Chart(dailyViewsCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dailyViews->pluck('date')) !!},
            datasets: [{
                label: 'Vues de pages',
                data: {!! json_encode($dailyViews->pluck('views')) !!},
                backgroundColor: 'rgba(79, 70, 229, 0.2)',
                borderColor: 'rgba(79, 70, 229, 1)',
                borderWidth: 2,
                tension: 0.2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    // Graphique des appareils
    const devicesCtx = document.getElementById('devicesChart').getContext('2d');
    const devicesChart = new Chart(devicesCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($devices->pluck('device_type')) !!},
            datasets: [{
                data: {!! json_encode($devices->pluck('count')) !!},
                backgroundColor: [
                    'rgba(79, 70, 229, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush
@endsection
