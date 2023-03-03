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
                        <input class="" type="text" name="title" id="title" required><br>
                        <label for="body">
                            body<br>
                        </label><br>
                        <textarea class="" name="body" id="body" required></textarea><br>
                        <label for="category">
                            category<br>
                        </label><br>
                        <select name="category" id="category">
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
