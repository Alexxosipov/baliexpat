<x-admin-layout>
    <x-slot name="header">
        <x-admin.header title="Games"></x-admin.header>
    </x-slot>

    <div class="mb-6">
        <x-admin.buttons.link :href="route('admin.games.create')">Create game</x-admin.buttons.link>
    </div>
    <x-admin.tables.table>
        <x-slot name="header">
            <x-admin.tables.head-cell>Id</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Team 1</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Score</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Team 2</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Location</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Date</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Actions</x-admin.tables.head-cell>
        </x-slot>
        <x-slot name="content">
            @foreach($games as $game)
                <x-admin.tables.body-row>
                    <x-admin.tables.body-cell>{{ $game->id }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>{{ $game->homeTeam->name }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>{{ $game->score }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>{{ $game->awayTeam->name }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>{{ $game->location }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>{{ $game->start_at->format('d.m.Y H:i') }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell><a href="{{ route('admin.games.show', compact('game')) }}">More</a></x-admin.tables.body-cell>
                </x-admin.tables.body-row>
            @endforeach
        </x-slot>
    </x-admin.tables.table>
</x-admin-layout>
