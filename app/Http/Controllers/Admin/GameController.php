<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGameRequest;
use App\Models\Game;
use App\Models\Player;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with(['tournament', 'homeTeam', 'awayTeam'])->get();

        return view('admin.games.index', compact('games'));
    }

    public function show(Game $game)
    {
        $game->load(['tournament', 'homeTeam', 'awayTeam', 'events']);
        $players = Player::all();

        return view('admin.games.show', compact('game', 'players'));
    }

    public function create()
    {
        $teams = Team::all();
        $tournaments = Tournament::all();
        return view('admin.games.create', compact('teams', 'tournaments'));
    }

    public function store(CreateGameRequest $request)
    {
        $data = $request->validated();

        if (!$request->get('tournament_id')) {
            $data['tournament_id'] = null;
        }

        Game::create($data);

        return redirect()->route('admin.games.index');
    }

    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    public function update(Game $game, Request $request)
    {
        $game->update($request->only(['home_goals', 'away_goals']));

        return redirect()->route('admin.games.show', compact('game'));
    }

    public function destroy(Game $game)
    {
        $game->events()->delete();
        $game->delete();

        return redirect()->route('admin.games.index');
    }
}
