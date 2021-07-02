<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSponsorRequest;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        return view('admin.sponsors.create');
    }

    public function store(CreateSponsorRequest $request)
    {
        $sponsor = Sponsor::create($request->only(['name', 'description']));

        \Storage::disk('public')->putFileAs("sponsors", $request->file('logo'), "logo_{$sponsor->id}.png");
        \Storage::disk('public')->putFileAs("sponsors", $request->file('background'), "background_{$sponsor->id}.jpg");

        return redirect()->route('admin.sponsors.index');
    }
}
