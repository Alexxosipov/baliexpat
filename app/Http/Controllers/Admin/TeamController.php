<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::paginate();

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(CreateTeamRequest $request)
    {
        $team = Team::create($request->only('name'));

        \Storage::disk('public')->putFileAs("teams/logos", $request->file('logo'), "logo_{$team->id}.jpg");

        return redirect()->route('admin.teams.index');
    }
}
