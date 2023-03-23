<x-adminpage>
    @forelse($post as $p )
        <div class="mb-6 p-2 rounded-md"
             style="border-color: #1a202c; border-width: 1px; border-style: solid;">
            <a href="../post/{{ $p->id }}"><h3
                    class="text-lg text-center hover:underline">{!!  clean($p->title) !!}</h3></a>
            <span class="text-sm text-gray-400">Posted by <a href="user/{{ $p->author }}"
                                                             class="text-sm text-gray-300 hover:underline">{{$p->author}}</a></span>
            <p>{!! clean($p->body) !!}</p>
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
                <form method="POST" name="delete">
                    @csrf

                    <button name="id" value="{{ $p->id }}" class="">approve</button>
                </form>
            </div>
            </div>

    @empty
        <h1 class="text-center">All posts are approved!</h1>
    @endforelse
    <div class="text-white ">
        {{ $post->appends(request()->query())->links() }}
    </div></div>
</x-adminpage>
