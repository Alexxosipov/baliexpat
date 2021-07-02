<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @stack('styles')
</head>
<body class="font-sans antialiased text-gray-900">
<div id="app" class="flex">
    <div class="w-48 h-full fixed bg-blue-900 text-white py-6 flex flex-col justify-between">
        <div>
            <div class="fill-current text-white px-4">
                Bali Expat Admin
            </div>
            <div class="mt-10">
                <x-admin.navigation.link :href="route('admin.games.index')">Games</x-admin.navigation.link>
                <x-admin.navigation.link :href="route('admin.players.index')">Players</x-admin.navigation.link>
                <x-admin.navigation.link :href="route('admin.tournaments.index')">Tournaments</x-admin.navigation.link>
                <x-admin.navigation.link :href="route('admin.teams.index')">Teams</x-admin.navigation.link>
                <x-admin.navigation.link :href="route('admin.sponsors.index')">Sponsors</x-admin.navigation.link>
            </div>
        </div>
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-admin.navigation.link href="{{ route('logout') }}"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-admin.navigation.link>
            </form>
        </div>
    </div>
    <div class="flex-grow ml-48">
        {{ $header }}
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>

@stack('scripts')
</body>
</html>
