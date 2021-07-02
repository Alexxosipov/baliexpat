<x-app-layout>
    <x-content-body noWhiteBackground>
        @if($upcomingGames->isNotEmpty())
            <div>
                <x-header>Upcoming games</x-header>
                <x-games.grid.grid>
                    @foreach($upcomingGames as $upcomingGame)
                        <x-games.preview :game="$upcomingGame"/>
                    @endforeach
                </x-games.grid.grid>
            </div>
        @endif
        @if($recentGames->isNotEmpty())
            <div class="mt-12">
                <x-header>Recent games</x-header>
                <x-games.grid.grid>
                    @foreach($recentGames as $recentGame)
                        <x-games.preview :game="$recentGame"/>
                    @endforeach
                </x-games.grid.grid>
            </div>
        @endif
    </x-content-body>
</x-app-layout>
