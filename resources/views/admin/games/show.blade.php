<x-admin-layout>
    <x-slot name="header">
        <x-admin.header :title='"Game #{$game->id}"'></x-admin.header>
    </x-slot>
    <div class="mb-6 inline-flex space-x-4">
        <form action="{{ route('admin.games.destroy', compact('game')) }}" method="POST">
            @csrf
            @method('delete')
            <x-button>Delete game</x-button>
        </form>
        <x-admin.buttons.link :href="route('admin.games.edit', compact('game'))">Change score</x-admin.buttons.link>
    </div>
    <x-admin.tables.table>
        <x-slot name="content">
            <x-admin.tables.body-row>
                <x-admin.tables.body-cell>Id</x-admin.tables.body-cell>
                <x-admin.tables.body-cell>{{ $game->id }}</x-admin.tables.body-cell>
            </x-admin.tables.body-row>
            <x-admin.tables.body-row>
                <x-admin.tables.body-cell>Home team</x-admin.tables.body-cell>
                <x-admin.tables.body-cell>{{ $game->homeTeam->name }}</x-admin.tables.body-cell>
            </x-admin.tables.body-row>
            <x-admin.tables.body-row>
                <x-admin.tables.body-cell>Away team</x-admin.tables.body-cell>
                <x-admin.tables.body-cell>{{ $game->awayTeam->name }}</x-admin.tables.body-cell>
            </x-admin.tables.body-row>
            <x-admin.tables.body-row>
                <x-admin.tables.body-cell>Tournament</x-admin.tables.body-cell>
                <x-admin.tables.body-cell>{{ $game->tournament_name }}</x-admin.tables.body-cell>
            </x-admin.tables.body-row>
            <x-admin.tables.body-row>
                <x-admin.tables.body-cell>Score</x-admin.tables.body-cell>
                <x-admin.tables.body-cell>{{ $game->score }}</x-admin.tables.body-cell>
            </x-admin.tables.body-row>
        </x-slot>
    </x-admin.tables.table>

    <div class="mt-6">
        <x-header>Game's events history</x-header>
        <div class="mt-4">
            <x-admin.tables.table>
                <x-slot name="header">
                    <x-admin.tables.head-cell>Type</x-admin.tables.head-cell>
                    <x-admin.tables.head-cell>Player</x-admin.tables.head-cell>
                    <x-admin.tables.head-cell>Team</x-admin.tables.head-cell>
                    <x-admin.tables.head-cell>Minute</x-admin.tables.head-cell>
                    <x-admin.tables.head-cell></x-admin.tables.head-cell>
                </x-slot>
                <x-slot name="content">
                    @foreach($game->events as $gameEvent)
                        <x-admin.tables.body-row>
                            <x-admin.tables.body-cell>{{ $gameEvent->event_type_name }}</x-admin.tables.body-cell>
                            <x-admin.tables.body-cell>{{ $gameEvent->player_name }}</x-admin.tables.body-cell>
                            <x-admin.tables.body-cell>{{ $gameEvent->team->name }}</x-admin.tables.body-cell>
                            <x-admin.tables.body-cell>{{ $gameEvent->minute }}</x-admin.tables.body-cell>
                            <x-admin.tables.body-cell>
                                <form action="{{ route('admin.games.events.destroy', compact('game', 'gameEvent')) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-button>Delete event</x-button>
                                </form>
                            </x-admin.tables.body-cell>
                        </x-admin.tables.body-row>
                    @endforeach
                </x-slot>
            </x-admin.tables.table>
            <div class="mt-20">
                <x-header>Create an event</x-header>
                <form action="{{ route('admin.games.events.create', compact('game')) }}" method="POST" class="mt-4">
                    @csrf

                    <div class="mt-4">
                        <x-label for="team_id" class="mb-1">Team</x-label>
                        <select id="team_id" name="team_id" class="min-w-[5rem] rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="{{ $game->homeTeam->id }}">{{ $game->homeTeam->name }}</option>
                            <option value="{{ $game->awayTeam->id }}">{{ $game->awayTeam->name }}</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="event_type">Type</x-label>
                        <select id="event_type" name="event_type" class="min-w-[5rem] rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="1">Goal</option>
                            <option value="2">Yellow card</option>
                            <option value="3">Red card</option>
                            <option value="4">Assist</option>
                        </select>
                    </div>
                    <div class="mt-4" x-data="{player_exists: true}">
                        <div x-show="player_exists">
                            <x-label for="location">Player</x-label>
                            <div class="inline-flex">
                                <select id="player_id" name="player_id" class="min-w-[5rem] rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach($players as $player)
                                        <option value="{{ $player->id }}">{{ $player->full_name }}</option>
                                    @endforeach
                                </select>
                                <x-button x-on:click.prevent="player_exists = false" class="ml-4">create new</x-button>
                            </div>
                        </div>
                        <div x-show="!player_exists">
                            <div class="inline-flex">
                                <div>
                                    <x-label>Player's number</x-label>
                                    <x-input id="player_number" name="player_number" type="number"/>
                                </div>
                                <div class="ml-2">
                                    <x-label>Player's name</x-label>
                                    <x-input id="player_name" name="player_name" type="text"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-label>Minute</x-label>
                        <x-input id="minute" name="minute" type="number" required/>
                    </div>
                    <div class="mt-4">
                        <x-button>Create</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
