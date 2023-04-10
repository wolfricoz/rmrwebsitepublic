<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 dark:text-gray-200 leading-tight text-center pb-0.5">
            {!! clean($post->title) !!}
            <p class="text-sm">Posted at: {{ $post->created_at->format('d/m/Y') }}</p>
            <p class="text-sm">Author: <a href="{{ route('getuser', $post->author) }}">{{ $post->author }}</a></p>
            <p class="text-sm">Category: <a href="{{ route('index', ['category'=>$post->category]) }}">{{ $post->category }}</a></p>




        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{!! clean($post->body) !!}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
