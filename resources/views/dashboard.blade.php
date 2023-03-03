<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @forelse($post as $p )
                        <div class=" mb-6 p-2" style="border-color: #1a202c; border-width: 1px; border-style: solid;">
                            <h3 class="text-lg text-center">{{ $p->title }}</h3>
                            <span class="text-sm">by {{$p->author}}</span>
                            <p>{{ $p->body }}</p>
                            <p class="text-sm text-gray-400">posted at {{ $p->created_at }}</p>
                        </div>
                    @empty
                        <p>No posts in database</p>
                    @endforelse
                    <div class="text-white ">
                        {{ $post->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
