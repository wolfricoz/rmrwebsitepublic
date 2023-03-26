<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
    <x-rich-text-trix-styles />

    <x-rich-text-trix-styles />


</head>
<body class="bg-gray-700">
<x-adminnav>

</x-adminnav>
    <div class="m-auto mt-6 bg-gray-800 max-w-6xl p-3 text-gray-200 rounded-md">
        {{ $slot }}
    </div>
<x-popup>

</x-popup>
</body>
