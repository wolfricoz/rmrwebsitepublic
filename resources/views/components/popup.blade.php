@if(Session::has('message'))
    <div x-data="{ show: true }"
         x-init="setTimeout(()=>show = false, 4000)"
         x-show="show"
    >
        <p  class="fixed bottom-0 right-0 bg-blue-500 rounded-md p-1 m-1">{{Session::get('message')}}</p>
    </div>
@elseif(Session::has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(()=>show = false, 4000).fadeOut('slow')"
         x-show="show"
    >
        <p  class="fixed bottom-0 right-0 bg-green-600 rounded-md p-1 m-1">{{Session::get('success')}}</p>
    </div>
@elseif(Session::has('warning'))
    <div x-data="{ show: true }"
         x-init="setTimeout(()=>show = false, 4000)"
         x-show="show"
    >
        <p  class="fixed bottom-0 right-0 bg-orange-600 rounded-md p-1 m-1">{{Session::get('warning')}}</p>
    </div>
@elseif(Session::has('error'))
    <div x-data="{ show: true }"
         x-init="setTimeout(()=>show = false, 4000)"
         x-show="show"
    >
        <p  class="fixed bottom-0 right-0 bg-red-600 rounded-md p-1 m-1">{{Session::get('error')}}</p>
    </div>

@endif
