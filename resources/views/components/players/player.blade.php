@props(['player'])

<div class="mt-4 rounded-lg">
    <img src="{{ $player->photo_url }}" alt="" class="mx-auto w-full rounded-t-lg">
    <div class="pr-4 py-4">
        <h2 class="text-lg sm:text-xl"><span class="mr-3">#{{ $player->number }}</span> <span class="font-bold text-yellow-300">{{ $player->full_name }}</span></h2>
        <p class="text-md sm:text-lg mt-1">{{ \Illuminate\Support\Str::ucfirst($player->position_name) }}</p>
    </div>
</div>
