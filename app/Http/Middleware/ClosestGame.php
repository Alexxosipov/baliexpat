<?php

namespace App\Http\Middleware;

use App\Models\Game;
use App\Models\Sponsor;
use Closure;
use Illuminate\Http\Request;

class ClosestGame
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $closestGame = Game::query()
            ->whereBetween('start_at', [now()->subHours(2), now()->addDay()])
            ->first();

        $sponsors = Sponsor::all();

        \View::share('closestGame', $closestGame);
        \View::share('sponsors', $sponsors);

        return $next($request);
    }
}
