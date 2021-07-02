<x-admin-layout>
    <x-slot name="header">
        <x-admin.header :title='"Edit game #{$game->id}"'></x-admin.header>
    </x-slot>

    <x-auth-validation-errors/>
    <form action="{{ route('admin.games.update', compact('game')) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <x-label for="home_goals">Home team's goals ({{ $game->homeTeam->name }})</x-label>
            <x-input id="home_goals" name="home_goals" type="number" required/>
        </div>
        <div class="mt-4">
            <x-label for="away_goals">Home team's goals ({{ $game->awayTeam->name }})</x-label>
            <x-input id="away_goals" name="away_goals" type="number" required/>
        </div>
        <div class="mt-4">
            <x-button>Save the score</x-button>
        </div>
    </form>
</x-admin-layout>
