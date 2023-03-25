<x-adminpage>
    <div class="grid grid-cols-12 ">
        <div class="col-span-2 border-blue-900 border"><h6 class="text-center">Name</h6></div>
        <div class="col-span-1 border-blue-900 border"><h6 class="text-center">Date of Birth</h6></div>
        <div class="col-span-1 border-blue-900 border"><h6 class="text-center">joined at</h6></div>
        <div class="col-span-3 border-blue-900 border"><h6 class="text-center">Email</h6></div>
        <div class="col-span-1 border-blue-900 border"><h6 class="text-center">IP</h6></div>
        <div class="col-span-1 border-blue-900 border"><h6 class="text-red-500 text-center">IsPatron</h6></div>
        <div class="col-span-1 border-blue-900 border"><h6 class="text-red-500 text-center">IsMod</h6></div>
        <div class="col-span-1 border-blue-900 border"><h6 class="text-red-500 text-center">IsAdmin</h6></div>
        <div class="col-span-1 border-blue-900 border"><h6 class="text-red-500 text-center">submit</h6></div>
        {{--            <div class="col-span-1 border-blue-900 border"></div>--}}
        {{--            <div class="col-span-1 border-blue-900 border"></div>--}}
    </div>
    @foreach($user as $u)
        <form method="POST" name="update" >
            @csrf
            <input type="hidden" id="id" name="id" value="{{ $u->id }}">
        <div class="grid grid-cols-12 ">
            <div class="col-span-2 border-blue-900 border text-center"><p>{{ $u->name }}</p></div>
            <div class="col-span-1 border-blue-900 border text-center"><p>{{ date('m/d/Y', strtotime($u->dob)) }}</p></div>
            <div class="col-span-1 border-blue-900 border text-center"><p>{{ $u->created_at->format('m/d/Y') }}</p></div>
            <div class="col-span-3 border-blue-900 border text-center"><p>{{ $u->email }}</p></div>
            <div class="col-span-1 border-blue-900 border text-center"><p>{{ $u->last_login_ip }}</p></div>
            <div class="col-span-1 border-blue-900 border text-center"><input type="checkbox" name="IsPatron" id="IsPatron" {{ $u->IsPatron ? 'checked' : '' }}></div>
            <div class="col-span-1 border-blue-900 border text-center"><input type="checkbox" name="IsMod" id="IsMod" {{ $u->IsMod ? 'checked' : '' }}></div>
            <div class="col-span-1 border-blue-900 border text-center"><input type="checkbox" name="IsAdmin" id="IsAdmin" {{ $u->IsAdmin ? 'checked' : '' }}></div>
            <div class="col-span-1 border-blue-900 border text-center"><button>Update</button></div>
        </div>
        </form>



    @endforeach
    {{ $user->links() }}

</x-adminpage>
@if(Session::has('message'))
{{--  Add alpine JS to make this disappear, from: https://laracasts.com/series/laravel-8-from-scratch/episodes/48 --}}
    <p  class="fixed bottom-0 right-0 bg-green-600 rounded-md p-1 m-1">{{Session::get('message')}}</p>
@endif
