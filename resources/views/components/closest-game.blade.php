@if($game)
<div class="mx-auto mt-12">
    <div class="bg-gray-100 px-6 py-12 rounded-lg bg-indigo-600 text-gray-100 text-center bg-opacity-5 overflow-hidden relative shadow-2xl">
        <img src="{{ asset('images/game-background.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 w-full h-full bg-opacity-75 bg-coolGray-900"></div>
        <div class="relative">
            <p class="font-bold text-5xl text-gray-50 uppercase mb-4">Soon!</p>
            <div class="text-2xl sm:text-3xl font-bold">
                <div class="flex flex-col md:flex-row md:space-x-4 justify-center items-center">
                    <div class="w-full md:w-4/12 text-center md:text-right"><span class="uppercase text-gray-50">{{ $game->homeTeam->name }}</span></div>
                    <div class="w-full md:w-3/12 text-center md:text-center text-lg"><span class="uppercase text-gray-400 tracking-widest">vs</span></div>
                    <div class="w-full md:w-4/12 text-center md:text-left"><span class="uppercase text-gray-50">{{ $game->awayTeam->name }}</span></div>
                </div>
            </div>
            <div class="mt-4">
                <p><b>Location:</b><span class="ml-2">{{ $game->location }}</span></p>
                <p><b>Game starts at {{ $game->start_at->format('H:i') }}</b></p>
                <p><b>{{ $game->start_at->format('d.m.Y') }}</b></p>
            </div>
        </div>
    </div>
</div>
@endif

