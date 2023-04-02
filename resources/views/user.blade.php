<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $name }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @forelse($post as $p )
                        <div class=" mb-6 p-2 rounded-md"
                             style="border-color: #1a202c; border-width: 1px; border-style: solid;">
                            <a href="../post/{{ $p->id }}"><h3
                                    class="text-lg text-center hover:underline">{!!  clean($p->title) !!}</h3></a>
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
                                        class="text-right text-sm text-gray-400">
                                        {{ $p->category}}
                                    </p>
                                </div>
                                @auth()
                                    @if($p->author == auth()->user()->name or auth()->user()->IsAdmin or auth()->user()->IsMod)
                                <x-postdropdown align="left" class="w-32">
                                    <x-slot name="trigger" class="border-1 border-white rounded-2xl ">
                                        <button class=" hover:text-gray-400 focus:text-gray-400 transition duration-150 ease-in-out">
                                            •••
                                        </button>
                                    </x-slot>

                                            <x-slot name="content">
                                                @if($p->author == auth()->user()->name)
                                                    <x-postdropdown-link :href="route('getuser', $p->author)">
                                                        Edit
                                                    </x-postdropdown-link>
                                                @endif
                                                    @if(auth()->user()->IsAdmin or auth()->user()->IsMod)
                                                        <x-postdropdown-link class="text-red-800">
                                                            <form method="POST" name="disapprove"
                                                                  action="{{ route('post.disapprove', $p) }}">
                                                                @csrf

                                                                <button name="id" value="{{ $p->id }}" class="text-red-600">Disapprove</button>
                                                            </form>
                                                        </x-postdropdown-link>
                                                        <x-postdropdown-link>
                                                            <form method="POST" name="delete"
                                                                  action="{{ route('post.destroy', $p) }}">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button name="id" value="{{ $p->id }}" class="text-red-600">Delete</button>
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
