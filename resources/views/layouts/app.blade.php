<!DOCTYPE html>
<html class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Livewire Examples</title>
    @stack('styles')
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50 h-full">
    <main class="mt-12 min-h-full">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </main>

    @stack('scripts')
    @livewireScripts
</body>
</html>
