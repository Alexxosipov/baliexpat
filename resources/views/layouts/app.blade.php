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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased text-gray-200">
        <div class="min-h-screen bg-coolGray-700">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="pb-6">
                @if($showClosestGame || $showSponsors)
                <x-content-body noWhiteBackground marginTop="0">
                    <div>
                        @if($showClosestGame)
                        <x-closest-game :game="$closestGame"/>
                        @endif

                        @if($showSponsors && $sponsors->isNotEmpty())
                            <div class="mt-12">
                                <x-header>Our sponsors</x-header>
                                <div class="grid grid-cols-1 sm:gap-4 sm:grid-cols-2">
                                    @foreach($sponsors as $sponsor)
                                        <x-sponsor :sponsor="$sponsor"/>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </x-content-body>
                @endif
                {{ $slot }}
            </main>
            @include('layouts.footer')
        </div>
    </body>
</html>
