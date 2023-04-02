<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center" >
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="flex gap-1 justify-center py-12">
        <div class="max-w-4xl  sm:px-6 lg:px-8">
            <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="user/post" class="text-blue-500">
                        @csrf
                        <div>
{{--                            <label for="title">--}}
{{--                                title <br>--}}
{{--                            </label>--}}
                            <input type="title" name="title" placeholder="[a4a][platform] an eye catching title here.." value=""
                                   class="inline-flex block border-blue-900 rounded-md bg-cyan-800 text-sm p-1 pl-2 justify-center w-full text-white">
                        </div>
                        <div>
                            <label for="body">
                                body<br>
                            </label><br>

                            <x-trix-field id="body" name="body" placeholder="Your post here" class="min-h-full h-48 bg-cyan-800 block"/>
                        </div>
                        <div>
                            <label for="category">
                                category<br>
                            </label><br>
                            <select name="category_id" id="category_id">
                                @foreach(\App\Models\category::all() as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <div class="fixed right-28 sm:px-6 lg:px-8">
            <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 max-w-sm w-96">
                    <h1 class="font-bold text-center">
                       Posting Guidelines
                    </h1>
                    <ol start="1" type="1" class="text-sm space-y-1 list-decimal">
                        <li class="list-item">
                            Think of your fellow users!
                        </li>
                        <li>
                            Don't be a cunt, really.
                        </li>
                        <li>
                            No pedophiles, fuckin' Yikes dude.
                        </li>

                    </ol>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
