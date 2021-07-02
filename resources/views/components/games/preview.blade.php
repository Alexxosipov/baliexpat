@props(['game'])

<a class="p-4 bg-coolGray-600 rounded-lg block hover:shadow-lg mt-2" href="{{ route('games.show', compact('game')) }}">
    <div class="text-center mb-4 text-sm">
        <p>{{ $game->tournament_name }}</p>
        <p>{{ $game->start_at->format('d.m.Y H:i') }}</p>
        <p>Location: <span class="font-semibold">{{ $game->location }}</span></p>
    </div>
    <div class="flex">
        <div class="w-2/5 text-right inline-flex items-center justify-end">
            <span>{{ $game->homeTeam->name }}</span>
            <img src="{{ $game->homeTeam->logo_url }}" class="h-4 ml-1" alt="">
        </div>
        <div class="w-1/5 text-center font-bold">{{ $game->score }}</div>
        <div class="w-2/5 text-left inline-flex items-center">
            <img src="{{ $game->awayTeam->logo_url }}" class="h-4 mr-1" alt="">
            <span>{{ $game->awayTeam->name }}</span>
        </div>
    </div>
</a>
