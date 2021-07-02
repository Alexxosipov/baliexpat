<x-admin-layout>
    <x-slot name="header">
        <x-admin.header title="Create a game"></x-admin.header>
    </x-slot>

    <x-auth-validation-errors/>
    <form action="{{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <x-label for="home_team_id" class="mb-1">Home team</x-label>
            <select id="home_team_id" name="home_team_id" class="min-w-[5rem] rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <x-label for="away_team_id" class="mb-1">Away team</x-label>
            <select id="away_team_id" name="away_team_id" class="min-w-[5rem] rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <x-label for="tournament_id" class="mb-1">Tournament</x-label>
            <select id="tournament_id" name="tournament_id" class="min-w-[5rem] rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="" selected>Friendly game</option>
                @foreach($tournaments as $tournament)
                    <option value="{{ $tournament->id }}">{{ $tournament->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <x-label for="start_at">Game starts at (format: day-month-year hours:minutes, example: 20.06.2021 16:00)</x-label>
            <x-input id="start_at" name="start_at" type="text" value="{{ old('start_at') }}" required/>
        </div>
        <div class="mt-4">
            <x-label for="location">Location</x-label>
            <x-input id="location" name="location" type="text" value="{{ old('location') }}" required/>
        </div>
        <div class="mt-4">
            <x-button>Create</x-button>
        </div>
    </form>
</x-admin-layout>
