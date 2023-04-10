<div>
    <form method="GET" name="categoryform" action="#">
        @csrf
        <select name="category" onchange="categoryform.submit();" class="inline-flex block border-blue-900 rounded-full bg-cyan-800 text-sm text-center p-1 w-36 mr-1 ml-1">
                <option value="false">Categories</option>
            @forelse ($categories as $c)
                @if($c->category == request('category'))
                    <option value="{{$c->category}}" selected="selected"> {{ $c->category }} </option>
                @else
                    <option value="{{$c->category}}"> {{ $c->category }} </option>
                @endif

            @empty
                None
            @endforelse
        </select>
        @if(request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
        @endif
        @if(request('paginate'))
            <input type="hidden" name="paginate" value="{{ request('paginate') }}">
        @endif
    </form>


    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
</div>
