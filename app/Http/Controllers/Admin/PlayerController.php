<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();

        return view('admin.players.index', compact('players'));
    }

    public function create()
    {
        return view('admin.players.create');
    }

    public function store(CreatePlayerRequest $request)
    {
        $player = Player::create($request->validated());

        \Storage::disk('public')
            ->putFileAs("players/photos", $request->file('photo'), "{$player->id}.jpg");

        return redirect()->route('admin.players.index');
    }
}
