<x-app-layout>
    <x-content-body noWhiteBackground>
        <h1 class="text-3xl font-bold mb-4">Squad</h1>
        <div class="mt-12">
            <div class="grid grid-cols-1 sm:gap-4 md:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 -mt-2">
                @foreach($players as $player)
                    <x-players.player :player="$player"/>
                @endforeach
            </div>
        </div>
    </x-content-body>
</x-app-layout>
