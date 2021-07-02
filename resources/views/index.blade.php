<x-app-layout>
    <x-content-body noWhiteBackground>
        <div>
            <div class="bg-gray-100 px-6 py-12 rounded-lg bg-indigo-600 text-gray-100 text-center bg-opacity-5 overflow-hidden relative shadow-2xl">
                <img src="{{ asset('images/squad.JPG') }}" alt="" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 w-full h-full bg-opacity-90 bg-coolGray-900"></div>
                <div class="relative p-6">
                    <h3 class="text-yellow-300 text-3xl md:text-5xl font-bold">We are Bali Expat</h3>
                    <div class="mt-12 max-w-xl mx-auto text-coolGray-300 text-sm sm:text-md">
                        <p>Our history starts from Jule 2020. Back in days, we played futsal 2-3 times a week and it became very boring for us.</p>
                        <p class="mt-4">We made decision to create a team to play football, not futsal. We found a field in Canggu, but it was smaller than usual field.</p>
                        <p class="mt-4">We started training several times a week. It wasn't easy for us because we have players from 12 different countries. Our mentality was very different.</p>
                        <p class="mt-4">After sometime we got over it and became friends, not just mates in team.</p>
                        <p class="mt-4">Now we're playing against local teams and in some tournaments in Bali.</p>
                        <p class="mt-4 text-lg font-bold text-coolGray-50">We became more than just a team.</p>
                    </div>
                </div>
            </div>
        </div>
        @if($upcomingGames->isNotEmpty())
            <div class="mt-12">
                <x-header>Upcoming games</x-header>
                <x-games.grid.grid>
                    @foreach($upcomingGames as $upcomingGame)
                        <x-games.preview :game="$upcomingGame"/>
                    @endforeach
                </x-games.grid.grid>
                <a href="{{ route('games.index') }}" class="px-6 py-3 bg-coolGray-900 hover:bg-coolGray-800 rounded uppercase tracking-widest font-bold text-sm inline-block mt-6">Show more</a>
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
                <a href="{{ route('games.index') }}" class="px-6 py-3 bg-coolGray-900 hover:bg-coolGray-800 rounded uppercase tracking-widest font-bold text-sm inline-block mt-6">Show more</a>
            </div>
        @endif
    </x-content-body>
</x-app-layout>
