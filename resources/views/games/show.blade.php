<x-app-layout :showSponsors="false">
    <x-content-body noWhiteBackground>
        <div class="flex flex-wrap justify-between -mx-4">
            <div class="w-full md:w-3/5 px-4">
                <div class="w-full text-center rounded bg-coolGray-600 px-4 py-6">
                    <p><b class="mr-2">{{ $game->tournament_name }}</b></p>
                    <p><b class="mr-2">Location:</b>{{ $game->location }}</p>
                    <p><b class="mr-2">Date:</b>{{ $game->start_at->format('d.m.Y H:i') }}</p>
                    <div class="inline-flex items-center text-xl mt-4">
                        <div class="text-right inline-flex items-center justify-end">
                            <span>{{ $game->homeTeam->name }}</span>
                            <img src="{{ $game->homeTeam->logo_url }}" class="h-6 ml-2" alt="">
                        </div>
                        <div class="text-center font-bold px-6">{{ $game->score }}</div>
                        <div class="text-left inline-flex items-center">
                            <img src="{{ $game->awayTeam->logo_url }}" class="h-6 mr-2" alt="">
                            <span>{{ $game->awayTeam->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="w-full text-center rounded px-4 py-6 mt-4">
                    <table class="mx-auto text-sm">
                        <tbody>
                        @foreach($game->events as $event)
                        <tr>
                            <td class="px-3 py-2 text-left">
                                <img src="{{ $event->icon }}" alt="" class="w-3">
                            </td>
                            <td class="px-3 py-2 text-left">{{ $event->minute }}'</td>
                            <td class="px-3 py-2 text-left">{{ $event->player_name }}</td>
                            <td class="px-3 py-2 text-left">
                                <div class="text-right inline-flex items-center justify-end">
                                    <span>{{ $event->team->name }}</span>
                                    <img src="{{ $event->team->logo_url }}" class="h-6 ml-2" alt="">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-full md:w-2/5 px-4 flex flex-col space-y-2">
                @foreach($sponsors as $sponsor)
                    <x-sponsor :sponsor="$sponsor"/>
                @endforeach
            </div>
        </div>
    </x-content-body>
</x-app-layout>

