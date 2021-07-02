<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $recentGames = Game::query()
            ->with(['tournament', 'homeTeam', 'awayTeam'])
            ->where('start_at', '<', now()->subHours(2))
            ->limit(6)
            ->get();

        $upcomingGames = Game::query()
            ->with(['tournament', 'homeTeam', 'awayTeam'])
            ->where('start_at', '>=', now()->subHours(2))
            ->limit(6)
            ->get();

        return view('index', compact('recentGames', 'upcomingGames'));
    }
}
