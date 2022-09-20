<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <div class="font-sans text-gray-900 antialiased">
            <div class="flex flex-col sm:justify-center items-center pt-5 pb-5">
                <h2 class="font-bold text-2xl">Livewire Test</h2>
                <div class="w-full sm:max-w-3xl mt-6 mb-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <livewire:location />
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
