@auth()
    <x-panel>
        <form method="POST" action="/posts/{{$post->slug}}/comments ">
            @csrf
            <header class="flex items-center">
                <img src="http://i.pravatar.cc/100?u={{auth()->id()}}" alt="" width="50" height="50"
                     class="rounded-full">
                <h2 class="ml-2"> Want to participate? </h2>
            </header>
            <div class="mt-6">
                            <textarea name="body"
                                      class="w-full text-sm focus:outline-none"
                                      cols="30"
                                      rows="5"
                                      placeholder="think about something to say!"
                                      required>
                            </textarea>
                @error('body')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror

            </div>
            <x-submit-button>post</x-submit-button>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">register</a> or <a href="/login"
                                                                       class="hover:underline">Log
            in </a> to leave a comment
    </p>
@endauth
