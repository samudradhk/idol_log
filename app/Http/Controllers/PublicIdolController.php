<?php

namespace App\Http\Controllers;

use App\Models\IdolActivity;

class PublicIdolController extends Controller
{
    /**
     * Show all idols as cards (publicly accessible).
     */
    public function index()
    {
        $idols = IdolActivity::selectRaw('idol_name, COUNT(*) as activity_count, MAX(activity_date) as latest_date')
            ->groupBy('idol_name')
            ->orderBy('idol_name')
            ->get();

        return view('public.index', compact('idols'));
    }

    /**
     * Show all activities for a specific idol (publicly accessible).
     */
    public function show(string $idolName)
    {
        $activities = IdolActivity::where('idol_name', $idolName)
            ->orderBy('activity_date', 'desc')
            ->get();

        abort_if($activities->isEmpty(), 404);

        return view('public.show', compact('idolName', 'activities'));
    }
}
