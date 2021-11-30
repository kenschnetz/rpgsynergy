<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        @livewireStyles
        <link rel="stylesheet" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script>
            (function() {;
                window.onpageshow = function(event) {
                    if(location.href === 'https://forge.geekworksstudios.com'
                        || location.href === 'https://forge.geekworksstudios.com/items'
                        || location.href === 'https://forge.geekworksstudios.com/monsters'
                        || location.href === 'https://forge.geekworksstudios.com/hooks'
                        || location.href === 'https://forge.geekworksstudios.com/abilities'
                        || location.href === 'https://forge.geekworksstudios.com/misc'
                    ) {
                        if (event.persisted) {
                            var scrollpos = localStorage.getItem('scrollpos');
                            if (scrollpos) {
                                window.scroll(0, scrollpos);
                            }
                            window.location.reload();
                            localStorage.setItem('scrollpos', window.scrollY);
                        }
                    }
                };
            })();
        </script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100" style="margin-bottom: -48px !important;">
            @include('layouts.navigation')
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <div class="bg-white text-center p-3 mt-5 underline text-blue-500 border-t border-gray-200 shadow">
            <a href="{{ route('terms') }}">Terms and Conditions</a>
        </div>
        @livewireScripts
        <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
    </body>
</html>
