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
                    {{ __("Post creation time") }}
                    <form method="POST" action="user/post" class="text-blue-500">
                        @csrf
                        <label for="title">
                            title <br>
                        </label>
                        <x-trix-field id="title" name="title" class="min-h-full h-9 bg-gray-100"/>
                        <label for="body">
                            body<br>
                        </label><br>

                        <x-trix-field id="body" name="body" class="min-h-full h-48 bg-gray-100 block"/>
                        <label for="category">
                            category<br>
                        </label><br>
                        <select name="category_id" id="category_id">
                            @foreach(\App\Models\category::all() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
