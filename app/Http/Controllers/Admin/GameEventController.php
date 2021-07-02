<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGameEventRequest;
use App\Models\Game;
use App\Models\GameEvent;
use Illuminate\Http\Request;

class GameEventController extends Controller
{
    public function store(Game $game, CreateGameEventRequest $request)
    {
        $data = $request->validated();

        if ($request->get('player_name') && $request->get('player_number')) {
            unset($data['player_id']);
        }

        $game->events()->create($data);

        return redirect()->back();
    }

    public function destroy(Game $game, GameEvent $gameEvent)
    {
        $gameEvent->delete();

        return redirect()->back();
    }
}
