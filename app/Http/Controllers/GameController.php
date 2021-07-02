<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $recentGames = Game::query()
            ->with(['tournament', 'homeTeam', 'awayTeam'])
            ->where('start_at', '<', now()->subHours(2))
            ->get();

        $upcomingGames = Game::query()
            ->with(['tournament', 'homeTeam', 'awayTeam'])
            ->where('start_at', '>=', now()->subHours(2))
            ->get();

        return view('games.index', compact('recentGames', 'upcomingGames'));
    }

    public function show(Game $game)
    {
        $game->load(['tournament', 'homeTeam', 'awayTeam', 'events', 'events.player', 'events.team']);

        return view('games.show', compact('game'));
    }
}
