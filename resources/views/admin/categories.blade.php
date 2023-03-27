
<x-adminpage>
    <div class="grid grid-cols-12 mb-1 p-2 rounded-md w-full">
        <span class="text-sm col-span-1">ID</span>
        <span class="text-sm col-span-2">Category Name</span>
        <span class="text-sm col-start-10 col-span-1"># of posts</span>
        <span class="text-sm col-start-11 col-span-1">Edit</span>
        <span class="text-sm col-start-12 col-span-1">Delete</span>
    </div>
    @foreach($category as $c )
        <form method="POST" name="delete" action="{{ route('category.delete') }}">
            @csrf
            <div class="grid grid-cols-12 mb-1 p-2 rounded-md w-full">
                <span class="text-sm col-span-1">{!!  clean($c->id) !!}</span>
                <span class="text-sm col-span-2">{!!  clean($c->category) !!}</span>
                <span class="text-sm col-start-10 col-span-1">{!!  $post->where('category_id',$c->id)->count(); !!}</span>
                <a><span class="text-sm col-start-11 col-span-1">Edit</span></a>
                <span class="text-sm col-start-12 col-span-1"><button name="id" id="id" value="{{ $c->id }}" onclick="return confirm('Are you sure? All posts associated to this category will be permanently removed.')">Delete</button></span>
            </div>
        </form>
    @endforeach
        <form method="POST" name="create" action="{{route('category.create')}}">
            <input type="hidden" name="_method" value="PUT" />
            @csrf
            <div class="grid grid-cols-12 mb-1 p-2 rounded-md w-full">
                <span class="text-sm col-span-2">New Category</span>
                <span class="text-sm col-span-2 text-gray-200"><input class="border-blue-900 rounded-full bg-cyan-800 text-sm pl-1" name="category" id="category" value="{{ old('category') }}"/></span>
                <span class="text-sm col-span-1"><button>create</button></span>
            </div>
        </form>
</x-adminpage>
