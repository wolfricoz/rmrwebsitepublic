{{--<x-layout>--}}
{{--    <div--}}
{{--        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white p-4">--}}
{{--        @if (Route::has('login'))--}}
{{--            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">--}}
{{--                @auth--}}
{{--                    <a href="{{ url('/dashboard') }}"--}}
{{--                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>--}}
{{--                @else--}}
{{--                    <a href="{{ route('login') }}"--}}
{{--                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log--}}
{{--                        in</a>--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <a href="{{ route('register') }}"--}}
{{--                           class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>--}}
{{--                    @endif--}}
{{--                @endauth--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="grid grid-cols-3 grid-rows-6 p-10 mt-10">--}}

{{--            @forelse($post as $p )--}}
{{--                <div class="col-start-1 col-span-2 bg-white mb-6 p-2" style="border-color: #1a202c; border-width: 1px; border-style: solid;">--}}
{{--                    <h3 class="text-lg text-center">{{ $p->title }}</h3>--}}
{{--                    <span class="text-sm">by {{$p->author}}</span>--}}
{{--                    <p>{{ $p->body }}</p>--}}
{{--                    <p class="text-sm text-gray-400">posted at {{ $p->created_at }}</p>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--                <p>No posts in database</p>--}}
{{--            @endforelse--}}
{{--                <div class="col-start-3 col-span-1 row-start-1 row-span-6 bg-white pt-0 ml-10 mr-10">test</div>--}}
{{--            <div class="text-white col-span-2">--}}
{{--                {{ $post->links() }}--}}
{{--            </div>--}}
{{--                <div class=" col-span-1 ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">--}}
{{--                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) {{ date('m/d/Y')}}--}}
{{--                </div>--}}
{{--        </div>--}}


{{--    </div>--}}

{{--</x-layout>--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {!! clean($post->title->toTrixHtml()) !!} <br><a class="text-sm" href="../user/{{ $post->author }}">Author: {{ $post->author }}</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{!! clean($post->body->toTrixHtml()) !!}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>