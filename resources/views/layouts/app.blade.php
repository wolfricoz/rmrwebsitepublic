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
    <x-rich-text-trix-styles />

    <x-rich-text-trix-styles />


</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                {{ $header }}
            </div>

            @if(request()->routeIs('index') or request()->routeIs('user'))


            <div class="sm:px-6 lg:px-8 border-t border-gray-200 dark:border-gray-600">
                <div class="flex w-fit mx-auto text-gray-200">
                    <form method="GET" action="#">
                        @csrf
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if(request('paginate'))
                            <input type="hidden" name="paginate" value="{{ request('paginate') }}">
                        @endif
                        <input type="text" name="search" placeholder="search" value="{{ request('search') }}"
                               class="inline-flex block border-blue-900 rounded-full bg-cyan-800 text-sm text-center p-1 justify-center w-36">
                    </form>

                    <x-category-drop-down/>

                    <form method="GET" name="pagi" action="#">
                        @csrf
                        <select name="paginate" onchange="pagi.submit();"
                                class="inline-flex block justify-center border-blue-900 rounded-full bg-cyan-800 text-sm text-center p-1 w-36">
                            @if(request('paginate') == 20)
                                <option value="20" selected="selected">20</option>
                            @else
                                <option value="20">20</option>
                            @endif
                            @if(request('paginate') == 50)
                                <option value="50" selected="selected">50</option>
                            @else
                                <option value="50">50</option>
                            @endif
                            @if(request('paginate') == 100)
                                <option value="100" selected="selected">100</option>
                            @else
                                <option value="100">100</option>
                            @endif
                        </select>
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                    </form>
                </div>

            </div>
            @endif
        </header>
    @endif
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
