<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\PopulationData;
use App\Models\AgriculturalData;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        // Dashboard statistics
        $stats = [
            'total_users' => User::count(),
            'total_news' => News::count(),
            'published_news' => News::where('status', 'published')->count(),
            'draft_news' => News::where('status', 'draft')->count(),
        ];

        // Latest news
        $latestNews = News::latest()->take(5)->get();

        // Population data
        $populationData = PopulationData::latest()->first();

        // Agricultural data
        $agriculturalData = AgriculturalData::latest()->take(3)->get();

        return view('admin.dashboard', compact('stats', 'latestNews', 'populationData', 'agriculturalData'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
