<?php

namespace App\Http\Controllers;

use App\Models\PageView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    /**
     * Affiche le tableau de bord des statistiques.
     */
    public function index()
    {
        // Statistiques des 30 derniers jours
        $startDate = Carbon::now()->subDays(30);

        // Visites par jour
        $dailyViews = PageView::where('created_at', '>=', $startDate)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Pages les plus visitées
        $topPages = PageView::where('created_at', '>=', $startDate)
            ->select('page', DB::raw('count(*) as views'))
            ->groupBy('page')
            ->orderByDesc('views')
            ->limit(10)
            ->get();

        // Sources de trafic (referrers)
        $topReferrers = PageView::where('created_at', '>=', $startDate)
            ->whereNotNull('referrer')
            ->select('referrer', DB::raw('count(*) as views'))
            ->groupBy('referrer')
            ->orderByDesc('views')
            ->limit(10)
            ->get();

        // Appareils utilisés
        $devices = PageView::where('created_at', '>=', $startDate)
            ->select('device_type', DB::raw('count(*) as count'))
            ->groupBy('device_type')
            ->orderByDesc('count')
            ->get();

        // Total des visites
        $totalViews = PageView::where('created_at', '>=', $startDate)->count();
        $totalUniqueVisitors = PageView::where('created_at', '>=', $startDate)
            ->distinct('visitor_id')
            ->count('visitor_id');

        return view('admin.analytics.index', compact(
            'dailyViews',
            'topPages',
            'topReferrers',
            'devices',
            'totalViews',
            'totalUniqueVisitors'
        ));
    }
}
