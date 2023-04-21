<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __("Edit post: $post->title") }}
        </h2>
    </x-slot>

    <div class="flex gap-1 justify-center py-12">
        <div class="max-w-4xl  sm:px-6 lg:px-8">
            <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('post.update', $post) }}" class="text-blue-500">
                        @csrf
                        <div>
                            <label for="title">
                                <h1 class="text-center">Title</h1>
                            </label>
                            <input type="title" name="title" placeholder="[a4a][platform] an eye catching title here.."
                                   value="{{ $post->title  }}"
                                   class="inline-flex block border-blue-900 rounded-md bg-cyan-800 text-sm p-1 pl-2 justify-center w-full text-white">
                            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>
                        <div>
                            <label for="body">
                                <h1 class="text-center">body</h1>
                            </label><br>

                            <x-trix-field id="body" name="body" placeholder="Your post here"
                                          class="min-h-full h-48 bg-cyan-800 block" value="{!!   $post->body->toTrixHTML() !!}"/>
                            <x-input-error :messages="$errors->get('body')" class="mt-2"/>
                        </div>
                        <div class="pt-4">
                            <select class="inline-flex" name="category_id" id="category_id" required>


                                @if($post->category_id)
                                    @foreach(\App\Models\category::all() as $cat)
                                        @if($post->category_id == $cat->id)
                                            <option value="{{ $cat->id }}" selected>{{ $cat->category }}</option>

                                        @else
                                            <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option selected disabled>Categories</option>
                                    @foreach(\App\Models\category::all() as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                    @endforeach
                                @endif


                            </select>
                            <button type="submit" class="text-right inline-flex right-0">Submit</button>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
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
                            Rule 1
                        </li>
                        <li>
                            Rule 2.
                        </li>
                        <li>
                            Rule 3.
                        </li>

                    </ol>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
