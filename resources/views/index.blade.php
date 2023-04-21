<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Frontpage') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @forelse($post as $p )
                        <div class="mb-6 p-2 rounded-md bg-white dark:bg-gray-800"
                             style="border-color: #1a202c; border-width: 1px; border-style: solid;">
                            <a href="post/{{ $p->id }}"><h3
                                    class="text-lg text-center hover:underline">{!!   clean($p->title) !!}</h3>
                            </a>
                            <span class="text-sm text-gray-400">Posted by <a href="user/{{ $p->author }}"
                                                                             class="text-sm text-gray-300 hover:underline">{{$p->author}}</a></span>
                            <p>{!! clean($p->body->toTrixHtml()) !!}</p>
                            <div class="grid grid-cols-2">
                                <div class="col-span-1">
                                    <p class="text-sm text-gray-400">
                                        posted at
                                        <span class="text-gray-300">
                                            {{ $p->created_at->format('H:i:s d/m/Y') }}
                                        </span>,
                                        updated at
                                        <span class="text-gray-300">
                                            {{ $p->updated_at->format('H:i:s d/m/Y') }}
                                        </span>
                                    </p></div>
                                <div class="col-span-1"><p
                                        class="text-right text-sm text-gray-400 hover:text-gray-300 focus:text-gray-300">
                                        <a href="{{ route('index', ['search'=>request('search'), 'category'=>$p->category, 'paginate'=>request('paginate')]) }}">{{ $p->category}}</a>
                                    </p>
                                </div>
                                @auth()
                                    @if($p->author == auth()->user()->name or auth()->user()->IsAdmin or auth()->user()->IsMod)
                                        <x-postdropdown align="left" class="w-32">
                                            <x-slot name="trigger" class="border-1 border-white rounded-2xl ">
                                                <button
                                                    class=" hover:text-gray-400 focus:text-gray-400 transition duration-150 ease-in-out">
                                                    •••
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-postdropdown-link :href="route('getuser', $p->author)">
                                                    Profile
                                                </x-postdropdown-link>
                                                @if($p->author == auth()->user()->name)
                                                    <x-postdropdown-link :href="route('post.edit', $p)">
                                                        Edit
                                                    </x-postdropdown-link>
                                                @endif
                                                @if(auth()->user()->IsAdmin or auth()->user()->IsMod)
                                                    <x-postdropdown-link class="text-red-800">
                                                        <form method="POST" name="disapprove"
                                                              action="{{ route('post.disapprove', $p) }}">
                                                            @csrf

                                                            <button name="id" value="{{ $p->id }}" class="text-red-600">
                                                                Disapprove
                                                            </button>
                                                        </form>
                                                    </x-postdropdown-link>
                                                    <x-postdropdown-link>
                                                        <form method="POST" name="delete"
                                                              action="{{ route('post.destroy', $p) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button name="id" value="{{ $p->id }}" class="text-red-600">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </x-postdropdown-link>
                                                @endif

                                            </x-slot>
                                        </x-postdropdown>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @empty
                        <div class="mb-6 p-2 rounded-md bg-white dark:bg-gray-800 text-center p-2">
                            <p>No posts in database</p>
                        </div>

                    @endforelse
                    <div class="text-white ">
                        {{ $post->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4605197206330320"
        crossorigin="anonymous"></script>
